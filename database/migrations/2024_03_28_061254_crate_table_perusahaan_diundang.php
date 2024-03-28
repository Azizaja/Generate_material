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
        Schema::create('perusahaan_diundang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->unsignedInteger('status_approval')->nullable();
            $table->unsignedInteger('status_kualifikasi')->nullable();
            $table->unsignedInteger('status_notifikasi')->nullable();
            $table->unsignedInteger('undangan_ke')->nullable();
            $table->string('deskripsi')->nullable();
            $table->text('flag_penawar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_diundang');
    }
};
