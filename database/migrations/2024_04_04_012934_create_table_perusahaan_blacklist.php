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
        Schema::create('perusahaan_blacklist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('tipe')->nullable();
            $table->unsignedBigInteger('reff_id')->nullable();
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('approve_at')->nullable();
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->integer('status')->default(0);
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_blacklist');
    }
};
