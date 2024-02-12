<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCart extends Model
{
    protected $guarded = [];
    use HasFactory;

    
    public function book()
    {
        return $this->belongsTo(Book::class, "book_id");
    }
    public function package()
    {
        return $this->belongsTo(AnotherPackage::class, "package_id");
    }
    // public function order()
    // {
    //     return $this->hasMany(OrderBook::class, "cart_items_id");
    // }
}
