<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public $table="grades"; 
    protected $fillable = [
        'name',
        'notes',
    ];
    function groups(){
        return $this->hasMany('App\Models\Group','grade_id','id');
    }
}
