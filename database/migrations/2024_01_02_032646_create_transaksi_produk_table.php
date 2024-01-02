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
        Schema::create('transaksi_produk', function (Blueprint $table) {
            $table->string('transaksi_id', 15);
            $table->string('produk_id', 15);
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksis');
            $table->foreign('produk_id')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_produk');
    }
};
