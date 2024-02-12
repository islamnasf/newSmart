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
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('InvoiceId')->nullable();
            $table->string('InvoiceURL')->nullable();  //
            $table->bigInteger('customer_id')->nullable();
            $table->string('price')->nullable();  //
            $table->string('InvoiceStatus')->nullable();  //
            $table->string('IsSuccess')->nullable();  //
            $table->string('TransactionDate')->nullable();  //
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payments');
    }
};
