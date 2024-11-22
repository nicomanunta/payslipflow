<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $fillable = ['payroll_id', 'extra_overtime_hours', 'extra_thirteenth_salary', 'extra_fourteenth_salary', 'extra_reimbursement_expenses', 'extra_bonus_rewards', 'extra_notes'];
}
