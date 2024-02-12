<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnotherPackage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function book()
    {
        return $this->belongsToMany(Book::class, 'package_books', "package_id", "book_id", "id");
    }
    
    public function cartbook()
    {
        return $this->hasMany(BookCart::class, "package_id", "id");
    }
}
