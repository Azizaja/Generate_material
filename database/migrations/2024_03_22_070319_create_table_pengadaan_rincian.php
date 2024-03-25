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
        Schema::create('pengadaan_rincian', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('tipe', 3, 0);
            $table->string('nama')->nullable();
            $table->decimal('volume', 21, 3);
            $table->string('satuan')->nullable();
            $table->unsignedBigInteger('pengadaan_id')->nullable();
            $table->unsignedBigInteger('pekerjaan_rincian_id')->nullable();
            $table->unsignedDecimal('state')->nullable();
            $table->timestamps();
            $table->decimal('pajak', 6, 2)->nullable();
            $table->decimal('pajak_bm', 6, 2)->nullable();
            $table->decimal('volume_terpenuhi', 22, 2)->nullable();
            $table->boolean('status_terpenuhi')->nullable();
            $table->string('subpaket', 200)->nullable();
            $table->string('preq_no', 50)->nullable();
            $table->string('preq_item_no', 50)->nullable();
            $table->unsignedBigInteger('pr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan_rincian');
    }
};
