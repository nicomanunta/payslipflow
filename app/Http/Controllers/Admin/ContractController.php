<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Deduction;
use App\Models\Extra;
use App\Models\User;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contracts = Contract::all();

        return view('admin.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $users = User::all();
        
        $employeeId = $request->get('employee_id');
        // recupero il dipendente 
        $employee = Employee::findOrFail($employeeId);

        $contracts = Contract::where('employee_id', auth()->id())->get();

        return view('admin.contracts.create', compact('users', 'employee', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request){

        $form_data = $request->all();
        $contract = new Contract();

        $contract->contract_type = $request->input('contract_type');;
        $contract->employee_id = $form_data['employee_id'];
        $contract->user_id = auth()->user()->id;

        $contract->fill($form_data);
        $contract->save();

        return redirect()->route('admin.employees.show', ['employee' => $contract->employee_id]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
