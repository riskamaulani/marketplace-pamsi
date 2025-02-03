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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->integer('total');
            $table->integer('total_product');
            $table->string('status');
            $table->string('note')->nullable();
            $table->string('shipping');
            $table->integer('shipping_fee'); // Perbaikan di sini
            $table->integer('products_quantity');
            $table->json('products');
            $table->string('shop_id', 15)->nullable();
            $table->string('transaction_id', 15)->nullable();
            $table->boolean('rating');
            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shops')->nullOnDelete();
            $table->foreign('transaction_id')->references('id')->on('transactions')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
