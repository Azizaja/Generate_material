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
        Schema::create('m_position_credential', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255);
            $table->string('akses', 255);
            $table->integer('state');
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 255);
            $table->integer('status_lihat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_position_credential');
    }
};
