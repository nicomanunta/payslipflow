<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePayrollRequest;
use App\Http\Requests\UpdatePayrollRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Contract;
use App\Models\Deduction;
use App\Models\Extra;
use App\Models\User;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::with('employee')->latest()->get();

        return view('admin.payrolls.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $users = User::all();

        // Controllo se 'employee_id' è presente nella richiesta
        $employeeId = $request->get('employee_id');

        if ($employeeId) {
            // Recupero il dipendente solo se 'employee_id' è presente
            $employees = Employee::findOrFail($employeeId);
            $payrolls = Payroll::where('employee_id', $employeeId)->get();
        } else {
            // Altrimenti, prendo tutti i dipendenti
            $employees = Employee::where('employee_status', 'Attivo')->get();;
        }

        $contract = Contract::where('employee_id', $employeeId)->latest()->first();
        $deduction = Deduction::where('contract_id', $contract->id)->first();


        return view('admin.payrolls.create', compact('users', 'employees', 'payrolls', 'contract', 'deduction'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayrollRequest $request)
    {
        $form_data = $request->all();

        $form_data['extra_reimbursement_expenses'] = $form_data['extra_reimbursement_expenses'] ?? 0;
        $form_data['extra_bonus_rewards'] = $form_data['extra_bonus_rewards'] ?? 0;
        
        // dd($form_data);
        $employee = Employee::findOrFail($form_data['employee_id']);
        $latestContract = $employee->contracts()->orderBy('contract_start_date', 'desc')->first();

        $payroll = new Payroll();
        $payroll->employee_id = $employee->id;
        $payroll->contract_id = $latestContract->id;
        $payroll->fill($form_data);
        $payroll->save();

        $extra = new Extra();
        $extra->payroll_id = $payroll->id;
        $extra->fill($form_data);
        $extra->save();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {

        // Recupera il dipendente associato alla busta paga
        $employee = $payroll->employee;

        // Recupera il contratto del dipendente
        $contract = Contract::where('employee_id', $employee->id)->latest()->first();

        // Recupera le eventuali deduzioni associate al contratto
        $deduction = Deduction::where('contract_id', $contract->id)->first();

        // Passa alla vista tutti i dati necessari
        return view('admin.payrolls.edit', compact('payroll', 'employee', 'contract', 'deduction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayrollRequest $request, Payroll $payroll)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
