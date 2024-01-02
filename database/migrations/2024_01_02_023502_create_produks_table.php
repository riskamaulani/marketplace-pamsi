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
        Schema::create('produks', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('nama');
            $table->integer('harga');
            $table->string('deskripsi')->nullable();
            $table->string('gambar');
            $table->integer('stok');
            $table->string('status');
            $table->string('toko_id', 15);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('toko_id')->references('id')->on('tokos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
