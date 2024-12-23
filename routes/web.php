<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DashboardController;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $activeEmployeesCount = Employee::where('employee_status', 'Attivo')->count();
    $activePayrollsCount = Payroll::all()->count();
    return view('dashboard', compact('activeEmployeesCount', 'activePayrollsCount'));
})->name('dashboard');

//rotte crud
Route::middleware(['auth', 'verified'])->name('admin.')->group(function(){
    Route::resource('users', ProfileController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('payrolls', PayrollController::class);
    Route::resource('extras', ExtraController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
