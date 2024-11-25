<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = ['employee_id', 'dependent_family_members', 'dependent_children_under_24', 'dependent_children_over_24', 'dependent_children_with_disabilities']

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
