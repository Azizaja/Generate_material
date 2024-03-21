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
        Schema::create('metode_pengadaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 100);
            $table->string('nama');
            $table->string('sistem_pengadaan_id', 25);
            $table->string('metode_penilaian_id', 50);
            $table->string('metode_evaluasi_penawaran_id', 50);
            $table->string('metode_penyampaian_dokumen_id', 50);
            $table->string('master_metode_pengadaan_id', 100);
            $table->unsignedBigInteger('instansi_id');
            $table->unsignedBigInteger('state');
            $table->boolean('status_multi_pemenang')->default(false);
            $table->unsignedBigInteger('pendaftaran')->nullable();
            $table->unsignedBigInteger('prakualifikasi')->nullable();
            $table->unsignedBigInteger('penawaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_pengadaan');
    }
};
