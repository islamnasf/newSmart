<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBookDetail extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function orderItem()
    {
        return $this->hasMany(OrderBookItem::class, "order_id");
    }
    public function city()
    {
        return $this->hasOne(city::class, "city_id");
    }
    public function mandub()
    {
        return $this->hasOne(User::class, "mandub_id");
    }
}
