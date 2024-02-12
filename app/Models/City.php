<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
  
    public function mandoub()
    {
        return $this->belongsToMany(User::class, 'mandub_cities', "mandoub_id", "city_id", "id");
    }
    public function order()
    {
        return $this->hasOne(OrderBookDetail::class, "city_id");
    }
}
