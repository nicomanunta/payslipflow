<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['contract_id', 'employee_id', 'payroll_month', 'payroll_day_paid', 'payroll_net_salary', 'payroll_gross_salary']
}
