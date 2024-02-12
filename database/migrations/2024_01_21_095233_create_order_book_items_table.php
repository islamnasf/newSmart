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
        Schema::create('order_book_items', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->bigInteger('book_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_book_items');
    }
};
