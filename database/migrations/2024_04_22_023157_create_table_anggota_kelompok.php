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
        Schema::create('anggota_kelompok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('jabatan')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('state')->nullable();
            $table->unsignedBigInteger('urutan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_kelompok');
    }
};
