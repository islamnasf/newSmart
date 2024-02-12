<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function package()
    {
        return $this->belongsToMany(AnotherPackage::class, 'package_books', "book_id", "package_id", "id");
    }
    public function techer()
    {
        return $this->belongsTo(User::class, 'techer_id', 'id');
    }
    public function cartbook()
    {
        return $this->hasMany(BookCart::class, "book_id", "id");
    }
    public function target()
    {
       return $this->belongsTo(TargetBook::class, 'id', 'book_id');
    }
    public function mandubBooks()
    {
        return $this->belongsToMany(User::class, 'mandub_books', 'book_id', 'mandub_id')
        ->withPivot('mandub_quantity', 'minimum','station','distributor_active','mandub_active','mandub_target')
        ->withTimestamps();
    }
    
}
