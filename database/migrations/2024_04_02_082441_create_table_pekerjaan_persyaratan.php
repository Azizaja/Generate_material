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
        Schema::create('pekerjaan_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pekerjaan_id');
            $table->unsignedInteger('tipe');
            $table->text('deskripsi')->nullable();
            $table->unsignedDecimal('batas_lulus', 5, 2)->nullable();
            $table->unsignedInteger('evaluasi_id')->nullable();
            $table->unsignedInteger('master_persyaratan_id')->nullable();
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->unsignedInteger('ref_id')->nullable();
            $table->unsignedInteger('jenis')->default(0);
            $table->unsignedInteger('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_persyaratan');
    }
};
