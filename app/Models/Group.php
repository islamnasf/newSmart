<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $table="groups"; 
    protected $fillable = [
        'group_name',
        'details',
        'grade_id'
    ];
    function grades(){
        return $this->belongsTo('App\Models\Grade','grade_id','id','name','notes');
    }
}
