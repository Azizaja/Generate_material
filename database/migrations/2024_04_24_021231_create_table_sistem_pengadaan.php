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
        Schema::create('sistem_pengadaan', function (Blueprint $table) {
            $table->string('id', 25)->primary();
            $table->string('nama');
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->integer('min_peserta')->default(0);
            $table->integer('min_penawar')->default(0);
            $table->integer('min_kualifikasi')->default(0);
            $table->integer('min_teknis')->default(0);
            $table->integer('min_harga')->default(0);
            $table->integer('min_dokumen_kualifikasi')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistem_pengadaan');
    }
};
