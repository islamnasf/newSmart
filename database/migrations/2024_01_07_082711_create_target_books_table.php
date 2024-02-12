<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('target_books', function (Blueprint $table) {
            $table->id();
            $table->integer('target')->nullable();
            $table->integer('print')->nullable();
            $table->foreignId('book_id')->constrained('books');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_books');
    }
};
