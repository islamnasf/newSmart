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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('techer_id');
            $table->string('stage');
            $table->string('classroom');
            // $table->string('expiry_date')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->float('Teacher_ratio')->nullable();
            $table->bigInteger('book_price')->nullable();
            $table->enum('term_type',['termone','termtow']);
            $table->boolean('active')->default(1);
            $table->string('pdf');
            $table->timestamps();   
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
