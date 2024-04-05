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
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->string('path')->nullable();
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->string('ref_name')->nullable();
            $table->bigInteger('ref_id')->nullable();
            $table->integer('state')->default(0);
            $table->timestamps();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('nomor', 250)->nullable();
            $table->datetime('tanggal')->nullable();
            $table->string('penanggungjawab')->nullable();
            $table->integer('persyaratan_id')->nullable();
            $table->integer('status')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
