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
        Schema::create('master_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipe');
            $table->text('deskripsi')->nullable();
            $table->decimal('batas_lulus', 5, 2)->nullable();
            $table->unsignedBigInteger('evaluasi_id')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->timestamps();
            $table->boolean('status_boleh_diubah')->default(false)->nullable();;
            $table->unsignedBigInteger('jenis')->default(0);
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('is_deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_persyaratan');
    }
};
