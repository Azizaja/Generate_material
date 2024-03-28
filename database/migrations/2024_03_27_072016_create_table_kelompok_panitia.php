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
        Schema::create('kelompok_panitia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instansi_id')->nullable();
            $table->unsignedBigInteger('satuan_kerja_id')->nullable();
            $table->string('nama');
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->string('kode', 100)->nullable();
            $table->string('deskripsi1', 200)->nullable();
            $table->string('deskripsi2', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_panitia');
    }
};
