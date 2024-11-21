<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['employee_id', 'user_id', 'contract_name', 'contract_type', 'contract_level', 'contract_gross_salary', 'contract_weekly_hours', 'contract_vacation_days', 'contract_inps_tax', 'contract_naspi_tax', 'contract_surcharge_municipal', 'contract_start_date', 'contract_end_date'];
}
