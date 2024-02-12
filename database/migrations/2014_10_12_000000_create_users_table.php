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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('grade')->nullable();
            $table->string('group')->nullable();
            //for student
            $table->string('student_subscrip')->nullable();
            $table->string('renew')->nullable();
            $table->string('user_type')->default('user');
            // $table->enum('IsAdmin',['0','1'])->default('0');
            // $table->enum('user_type',['0','1'])->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('Teacher_ratio_course')->nullable();
            $table->string('password');
            $table->string('user_password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
