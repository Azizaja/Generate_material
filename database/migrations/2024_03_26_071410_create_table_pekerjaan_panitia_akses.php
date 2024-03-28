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
        Schema::create('pekerjaan_panitia_akses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerjaan_panitia_id');
            $table->string('akses');
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->unsignedDecimal('sequence', 20, 0)->nullable();
            $table->unsignedInteger('read_only')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_panitia_akses');
    }
};
