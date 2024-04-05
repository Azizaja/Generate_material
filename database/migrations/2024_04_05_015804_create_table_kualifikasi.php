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
        Schema::create('kualifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->decimal('fp', 5, 2)->nullable();
            $table->decimal('fl', 5, 2)->nullable();
            $table->decimal('kp', 5, 2)->nullable();
            $table->timestamps();
            $table->boolean('kd')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->decimal('state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualifikasi');
    }
};
