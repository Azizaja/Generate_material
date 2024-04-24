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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('user_nama', 500)->nullable();
            $table->string('created_at', 100)->nullable();
            $table->text('alasan')->nullable();
            $table->bigInteger('pekerjaan_id')->unsigned()->nullable();
            $table->integer('status')->nullable();
            $table->string('ip_address', 500)->nullable();
            $table->bigInteger('pengadaan_id')->unsigned()->nullable();
            $table->string('kode_tahap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
