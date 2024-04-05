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
        Schema::create('perusahaan_ijin_usaha', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perusahaan_id')->unsigned();
            $table->string('jenis')->nullable();
            $table->string('nomor')->nullable();
            $table->timestamp('tanggal_berlaku')->nullable();
            $table->string('instansi')->nullable();
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->string('klasifikasi_ijin')->nullable();
            $table->timestamp('tanggal_awal')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('file_id')->nullable();
            $table->integer('flag_validasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_ijin_usaha');
    }
};
