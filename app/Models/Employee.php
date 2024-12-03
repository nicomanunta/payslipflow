<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // AGGIUNGERE CITTA E REGIONE DI RESIDENZA, CONIUGI A CARICO    
    protected $fillable = ['user_id', 'employee_name', 'employee_surname', 'employee_email', 'employee_phone', 'employee_birth_date', 'employee_role', 'employee_status', 'employee_hiring_date', 'employee_img' ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function payrolls(){
        return $this->hasMany(Payroll::class);
    }

    
}

