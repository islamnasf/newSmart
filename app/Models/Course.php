<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function techer()
    {
        return $this->belongsTo(User::class, 'techer_id', 'id');
    }
    public function tutorial()
    {
        return $this->hasMany(Tutorial::class, 'course_id', 'id');
    }
    public function cartitem()
    {
        return $this->hasMany(CartItem::class, "course_id", "id");
    }
   public function user()
    {
        return $this->belongsToMany(User::class, 'user_courses', "course_id", "user_id", "id");
    }
    public function package()
    {
        return $this->belongsToMany(Package::class, 'package_courses', "course_id", "package_id", "id");
    }
}
