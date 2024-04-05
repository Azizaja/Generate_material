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
        Schema::create('perusahaan_spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perusahaan_id')->unsigned();
            $table->bigInteger('sub_bidang_id')->unsigned();
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->bigInteger('file_id')->unsigned()->nullable();
            $table->integer('kualifikasi_id')->unsigned()->nullable();
            $table->integer('kualifikasi_group_detail_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_spesifikasi');
    }
};
