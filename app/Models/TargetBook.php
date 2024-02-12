<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetBook extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Book()
    {
        return $this->hasMany(Book::class, "book_id", "id");
    }
}
