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
        Schema::create('shops', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('name')->nullable();
            $table->string('foto')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->json('manager');
            $table->json('open_schedule');
            $table->string('user_id', 15);
            $table->boolean('verify');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
