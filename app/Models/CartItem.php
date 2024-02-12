<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
    public function package()
    {
        return $this->belongsTo(Package::class, "package_id");
    }
    public function order()
    {
        return $this->hasMany(Order::class, "cart_items_id");
    }
}
