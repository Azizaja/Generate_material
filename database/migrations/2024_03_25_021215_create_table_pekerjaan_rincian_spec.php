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
        Schema::create('pekerjaan_rincian_spec', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerjaan_rincian_id');
            $table->unsignedInteger('urutan');
            $table->text('deskripsi')->nullable();
            $table->decimal('bobot', 20, 2)->nullable();
            $table->timestamps();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_rincian_spec');
    }
};
