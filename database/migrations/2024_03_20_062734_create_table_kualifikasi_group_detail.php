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
        Schema::create('kualifikasi_group_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('kualifikasi_id');
            $table->text('nama');
            $table->decimal('pekerjaan_batas_atas', 20, 2)->nullable();
            $table->decimal('pekerjaan_batas_bawah', 20, 2)->nullable();
            $table->decimal('kekayaan_batas_atas', 20, 2)->nullable();
            $table->decimal('kekayaan_batas_bawah', 20, 2)->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualifikasi_group_detail');
    }
};
