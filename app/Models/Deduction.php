<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Deduction extends Model
{
    use SoftDeletes;  // usa il trait SoftDeletes per la gestione della soft delete

    // indica che `deleted_at` è un campo datetime
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['contract_id', 'dependent_family_members', 'dependent_children_under_24']; 

    public function contract(){
        return $this->belongsTo(Contract::class);
    }
}
