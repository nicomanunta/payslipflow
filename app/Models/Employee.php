<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id', 'contract_id', 'employee_name', 'employee_surname', 'employee_email', 'employee_phone', 'employee_birth_date', 'employee_role', 'employee_status', 'employee_hiring_date' ];
}
