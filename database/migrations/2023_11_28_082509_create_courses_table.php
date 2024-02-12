<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->bigInteger('techer_id');
            $table->string('stage');
            $table->string('classroom');
            $table->string('expiry_date');
            $table->enum('type', ['free', 'cash'])->default('cash');
            $table->bigInteger('Teacher_ratio_course')->nullable();
            $table->bigInteger('term_price')->nullable();
            $table->bigInteger('monthly_subscription_price')->nullable();
            $table->enum('term_type',['termone','termtow']);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
