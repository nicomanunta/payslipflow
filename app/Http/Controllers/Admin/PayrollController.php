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
        $payrolls = Payroll::all();

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
        } else {
            // Altrimenti, prendo tutti i dipendenti
            $employees = Employee::all();
        }

        $payrolls = Payroll::where('employee_id', auth()->id())->get();

        return view('admin.payrolls.create', compact('users', 'employees', 'payrolls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayrollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayrollRequest $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
