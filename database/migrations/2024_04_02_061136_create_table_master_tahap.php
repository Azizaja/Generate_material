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
        Schema::create('master_tahap', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 100);
            $table->unsignedDecimal('urutan', 3, 0);
            $table->string('tipe', 1)->nullable();
            $table->string('nama');
            $table->unsignedDecimal('waktu_mulai');
            $table->unsignedDecimal('waktu_selesai');
            $table->string('master_metode_pengadaan_id', 100);
            $table->unsignedDecimal('evaluasi_id', 3, 0)->nullable();
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->boolean('sts_waktu_mulai_boleh_maju')->default(false);
            $table->boolean('sts_waktu_mulai_boleh_mundur')->default(false);
            $table->boolean('sts_waktu_selesai_boleh_maju')->default(false);
            $table->boolean('sts_waktu_selesai_boleh_mundur')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_tahap');
    }
};
