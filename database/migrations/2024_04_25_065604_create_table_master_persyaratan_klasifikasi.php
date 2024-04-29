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
        Schema::create('master_persyaratan_klasifikasi', function (Blueprint $table) {
            $table->unsignedBigInteger('master_persyaratan_id');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->unsignedBigInteger('state')->nullable();
            $table->timestamps();

            $table->primary(['master_persyaratan_id', 'klasifikasi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_persyaratan_klasifikasi');
    }
};
