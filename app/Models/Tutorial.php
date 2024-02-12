<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function video()
    {
        return $this->hasMany(Video::class, "tutorial_id", "id");
    }
    public function course()
    {
        return $this->belongsTo(Course::class,"course_id","id");
    }
}
