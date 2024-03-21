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
        Schema::create('m_commodity', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255);
            $table->string('nama', 255);
            $table->timestamp('created_at')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_commodity');
    }
};
