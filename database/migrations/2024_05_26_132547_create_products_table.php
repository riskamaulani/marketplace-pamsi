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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('name');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('stock')->nullable();
            $table->integer('sold');
            $table->string('status');
            $table->string('shop_id', 15);
            $table->string('category_id', 15)->nullable(); // Ubah tipe menjadi string
            $table->string('order_type');
            $table->float('ratings')->nullable();
            $table->integer('ratings_count');
            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shops')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
