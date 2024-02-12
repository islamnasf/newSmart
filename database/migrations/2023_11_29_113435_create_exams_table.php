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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('grade')->nullable();
            $table->string('group')->nullable();
            $table->string('season')->nullable();
            $table->string('previous_test')->nullable();
            $table->string('book_test')->nullable();
            $table->string('solved_test')->nullable();
            $table->string('unsolved_test')->nullable();
            $table->string('kiser_1')->nullable();
            $table->string('kiser_2')->nullable();
            $table->string('final_review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
