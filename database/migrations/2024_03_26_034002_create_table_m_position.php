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
        Schema::create('m_position', function (Blueprint $table) {
            $table->id();
            $table->text('position')->nullable();
            $table->unsignedBigInteger('application_user_id');
            $table->unsignedBigInteger('satuan_kerja_id');
            $table->unsignedBigInteger('instansi_id');
            $table->date('begin_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('ref_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_position');
    }
};
