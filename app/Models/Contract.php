<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contract extends Model
{
    use SoftDeletes;  // usa il trait SoftDeletes per la gestione della soft delete

    // indica che `deleted_at` è un campo datetime
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['employee_id', 'user_id', 'contract_name', 'contract_type', 'contract_level', 'contract_gross_monthly_salary', 'contract_week_hours', 'contract_vacation_days', 'contract_surcharge_municipal', 'contract_surcharge_regional', 'contract_start_date', 'contract_end_date'];

    // converto "contract_type" in array
    protected $casts = [
        'contract_type' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function payrolls(){
        return $this->hasMany(Payroll::class);
    }
    
    public function deduction(){
        return $this->hasOne(Deduction::class);
    }
}

