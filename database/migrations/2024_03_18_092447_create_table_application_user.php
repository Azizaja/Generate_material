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
        Schema::create('application_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipe_user_id');
            $table->unsignedBigInteger('instansi_id');
            $table->unsignedBigInteger('satuan_kerja_id');
            $table->string('username', 64);
            $table->string('nama');
            $table->string('default_password');
            $table->string('password');
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email');
            $table->text('public_key')->nullable();
            $table->boolean('disabled')->nullable();
            $table->text('alasan_disabled')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->unsignedBigInteger('provinsi')->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->string('ip_address', 20)->nullable();
            $table->string('token', 200)->nullable();
            $table->timestamp('token_time')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('tipe_user_id')->references('id')->on('user_types');
            // $table->foreign('instansi_id')->references('id')->on('institutions');
            // $table->foreign('satuan_kerja_id')->references('id')->on('work_units');
            // $table->foreign('provinsi')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_user');
    }
};
