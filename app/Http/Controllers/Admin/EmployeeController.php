<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Contract;
use App\Models\Payroll;
use App\Models\Deduction;
use App\Models\Extra;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $employees = Employee::latest()->get();

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $employees = Employee::where('user_id', auth()->id())->get();

        return view('admin.employees.create', compact('users', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        // dati inseriti nel form
        $form_data = $request->all();

        // salvataggio immagine se presente
        $employeeImgPath = null;
        if ($request->hasFile('employee_img')) {
            // salva img nella cartella 'employee_img' 
            $employeeImgPath = $request->file('employee_img')->store('employee_img', 'public');
            $form_data['employee_img'] = $employeeImgPath;  // aggiungi il percorso dell'immagine ai dati
        }
        
        // richiesta nuovo dipendente
        $employee = new Employee();
        $employee->user_id = auth()->user()->id;
        $slug = Str::slug($form_data['employee_name']. '-' .$form_data['employee_surname']);
        $form_data['slug'] = $slug;

        $employee->fill($form_data);
        $employee->save();

        return redirect()->route('admin.employees.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $contract = $employee->contracts()->latest()->first();
        $payroll = $employee->payrolls()->latest()->take(2)->get();
        return view('admin.employees.show', compact('employee', 'contract', 'payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
