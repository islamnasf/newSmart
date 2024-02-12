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
        Schema::create('mandub_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mandub_quantity')->nullable();
            $table->bigInteger('minimum')->default(2);
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('mandub_id')->constrained('users');
            $table->bigInteger('station')->nullable();
            $table->bigInteger('mandub_target')->nullable();
            $table->boolean('mandub_active')->default(0);
            $table->boolean('distributor_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandub_books');
    }
};
