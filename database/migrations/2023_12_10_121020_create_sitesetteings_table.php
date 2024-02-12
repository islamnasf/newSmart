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
        Schema::create('sitesetteings', function (Blueprint $table) {
            $table->id();
            $table->text('head_name')->nullable();
            $table->text('content1')->default('- هى المنصة الأولى من نوعها للتعليم .');
            $table->text('content2')->default('- تقدم تجربة شاملة للمتعلمين والمعلمين على حد سواء .');
            $table->text('content3')->default('- توفر المنصة مجموعة واسعة من الكتب والكورسات التعليمية في مختلف المجالات .');
            $table->text('content4')->default('- يمكن للمستخدمين تصفح وشراء الموارد التعليمية بسهولة وفقًا لاحتياجاتهم .');
            $table->text('fb')->default('https://www.facebook.com/');
            $table->text('insta')->default('https://www.instagram.com/');
            $table->text('twitter')->default('https://twitter.com/');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitesetteings');
    }
};
