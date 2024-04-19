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
        Schema::create('cpr', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kontrak_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->double('nilai');
            $table->timestamps();
            $table->string('created_by', 45)->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('gr_id')->nullable();
            $table->integer('cpr_type')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpr');
    }
};
