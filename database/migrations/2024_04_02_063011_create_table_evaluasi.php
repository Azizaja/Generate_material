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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('tipe', 3, 0);
            $table->string('nama');
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->boolean('status_boleh_ubah_persyaratan')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
