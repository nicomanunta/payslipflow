<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = ['contract_id', 'dependent_family_members', 'dependent_children_under_24']; 

    public function contract(){
        return $this->belongsTo(Contract::class);
    }
}
