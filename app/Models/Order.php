<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function cartitem()
    {
        return $this->belongsTo(CartItem::class, "cart_items_id");
    }
}
