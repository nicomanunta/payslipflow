<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['employee_id', 'contract_id', 'payroll_month', 'payroll_day_paid', 'payroll_net_salary', 'payroll_gross_salary'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function contract(){
        return $this->belongsTo(Contract::class);
    }

    public function extra(){
        return $this->hasOne(Extra::class);
    }
}
