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
        Schema::create('sub_bidang', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->unsignedBigInteger('klasifikasi_id')->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_bidang');
    }
};
