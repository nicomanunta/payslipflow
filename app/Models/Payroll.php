<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payroll extends Model
{
    use SoftDeletes;  // usa il trait SoftDeletes per la gestione della soft delete

    // indica che `deleted_at` è un campo datetime
    protected $dates = ['deleted_at'];
    
    // AGGIUNGERE DETRAZIONI IRPEF
    protected $fillable = ['employee_id', 'contract_id', 'payroll_month', 'payroll_day_paid', 'payroll_monthly_employee_deduction', 'payroll_net_salary', 'payroll_taxable_irpef', 'payroll_irpef_to_pay', 'payroll_total_inps', 'payroll_monthly_basic_deduction', 'payroll_monthly_family_deduction', 'payroll_monthly_children_deduction', 'payroll_total_surcharge'];

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
