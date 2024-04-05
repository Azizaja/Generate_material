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
        Schema::create('pekerjaan_pemenang', function (Blueprint $table) {
            $table->bigInteger('pekerjaan_id')->unsigned()->primary();
            $table->bigInteger('penawaran_id')->unsigned();
            $table->string('nomor_pp')->nullable();
            $table->timestamp('tanggal_pp')->nullable();
            $table->string('nomor_kontrak')->nullable();
            $table->timestamp('tanggal_pengesahan_kontrak')->nullable();
            $table->timestamp('tanggal_selesai_kontrak')->nullable();
            $table->integer('state')->nullable();
            $table->decimal('adendum_hari')->nullable();
            $table->timestamps();
            $table->boolean('status_multi_pemenang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_pemenang');
    }
};
