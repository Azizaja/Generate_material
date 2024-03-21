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
        Schema::create('metode_evaluasi_penawaran', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('nama');
            $table->unsignedBigInteger('state')->nullable();
            $table->integer('status_butuh_bobot_teknis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_evaluasi_penawaran');
    }
};
