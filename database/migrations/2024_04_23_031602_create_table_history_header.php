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
        Schema::create('history_header', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pekerjaan_id')->unsigned();
            $table->bigInteger('pengadaan_id')->unsigned()->nullable();
            $table->string('kode_pekerjaan')->nullable();
            $table->string('nama_pekerjaan')->nullable();
            $table->integer('status_terakhir')->nullable();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('instansi_id')->nullable();
            $table->integer('satuan_kerja_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_header');
    }
};
