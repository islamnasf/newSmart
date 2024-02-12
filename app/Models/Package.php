<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $guarded = [];

    use HasFactory;
    public function course()
    {
        return $this->belongsToMany(Course::class, 'package_courses', "package_id", "course_id", "id");
    }
    public function cartitem()
    {
        return $this->hasMany(CartItem::class, "package_id", "id");
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_packages', "user_id", "package_id", "id");
    }
}
