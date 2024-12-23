<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;  // usa il trait SoftDeletes per la gestione della soft delete

    // indica che `deleted_at` è un campo datetime
    protected $dates = ['deleted_at'];

    // AGGIUNGERE CITTA E REGIONE DI RESIDENZA, CONIUGI A CARICO    
    protected $fillable = ['user_id', 'employee_name', 'employee_surname', 'employee_sex', 'employee_email', 'employee_phone', 'employee_state', 'employee_region', 'employee_city', 'employee_birth_date', 'employee_role', 'employee_status', 'employee_hiring_date', 'employee_img', 'slug' ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function payrolls(){
        return $this->hasMany(Payroll::class);
    }

    // soft delete dei contratti, delle buste paga, delle deduzioni e degli extra
    protected static function booted()
    {
        static::deleting(function ($employee) {

            // contracts e deductions associati
            $employee->contracts->each(function ($contract) {
                if ($contract->deduction) {
                    $contract->deduction->delete(); // soft delete della deduction
                }
                $contract->delete(); // soft delete del contract
            });
            
            // payrolls e extras associati
            $employee->payrolls->each(function ($payroll) {
                if ($payroll->extra) {
                    $payroll->extra->delete(); // soft delete dell'extra
                }
                $payroll->delete(); // soft delete del payroll
            });
            
        });
    }

    // Calcolo l'età
    public function getAgeAttribute()
    {
        return Carbon::parse($this->employee_birth_date)->age;
    }

    
}

