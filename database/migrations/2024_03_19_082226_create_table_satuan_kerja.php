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
        Schema::create('satuan_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direksi_bidang_id')->nullable();
            $table->integer('ref_id');
            $table->unsignedBigInteger('instansi_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('kode');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->integer('jenis');
            $table->string('sandi', 100)->nullable();
            $table->string('kode_cabang', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satuan_kerja');
    }
};
