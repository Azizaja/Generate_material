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
        Schema::create('pekerjaan_log', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 200);
            $table->text('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('pekerjaan_id')->nullable();
            $table->unsignedBigInteger('pengadaan_id')->nullable();
            $table->unsignedBigInteger('penawaran_id')->nullable();
            $table->unsignedBigInteger('pengadaan_tahap_id')->nullable();
            $table->unsignedBigInteger('penawaran_tahap_id')->nullable();
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->unsignedInteger('state')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('history_id')->nullable();
            $table->timestamps();
            $table->string('user_name', 200);
            $table->unsignedInteger('jenis')->default(0);
            $table->string('ip_address', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_log');
    }
};
