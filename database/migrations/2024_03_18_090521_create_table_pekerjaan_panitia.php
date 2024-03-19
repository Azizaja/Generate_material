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
        Schema::create('pekerjaan_panitia', function (Blueprint $table) {
            $table->id();
            $table->integer('jabatan');
            $table->text('position')->nullable();
            $table->integer('state')->nullable();
            $table->integer('urutan')->nullable();
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('kelompok_panitia_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_panitia');
    }
};
