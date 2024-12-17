<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $fillable = ['payroll_id', 'extra_weekday_overtime_hours', 'extra_weekend_overtime_hours', 'extra_holiday_overtime_hours', 'extra_thirteenth_salary', 'extra_fourteenth_salary', 'extra_reimbursement_expenses', 'extra_bonus_rewards', 'extra_notes'];

    
    public function payroll(){
        return $this->belongsTo(Payroll::class);
    }
}
