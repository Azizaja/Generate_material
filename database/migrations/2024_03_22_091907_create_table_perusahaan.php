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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->text('npwp');
            $table->text('nama');
            $table->text('alamat');
            $table->text('rt')->nullable();
            $table->text('rw')->nullable();
            $table->text('kelurahan')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kota')->nullable();
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->text('email');
            $table->text('telepon')->nullable();
            $table->decimal('kekayaan_bersih', 20, 2)->nullable();
            $table->text('cp')->nullable();
            $table->text('cp_hp')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->text('pertanyaan')->nullable();
            $table->string('jawaban', 40)->nullable();
            $table->timestamp('waktu_aktivasi')->nullable();
            $table->text('fax')->nullable();
            $table->integer('boleh_hapus_ahli')->default(0);
            $table->text('dpp_nomor')->nullable();
            $table->date('dpp_tanggal_mulai')->nullable();
            $table->date('dpp_tanggal_berlaku')->nullable();
            $table->integer('dpp_status')->default(0);
            $table->integer('jenis_vendor')->default(0);
            $table->integer('state')->default(0)->nullable();
            $table->integer('drt_aktif')->default(0);
            $table->integer('perusahaan_asing')->default(0);
            $table->timestamps();
            $table->string('kode_pos', 10)->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->string('ip_address', 20)->nullable();
            $table->string('token', 200)->nullable();
            $table->timestamp('token_time')->nullable();
            $table->text('user_agent')->nullable();
            $table->integer('flag_bpo')->nullable();
            $table->integer('status_vendor')->nullable();
            $table->integer('approve_to')->nullable();
            $table->integer('status_rule')->nullable();
            $table->string('max_id', 20)->nullable();
            $table->timestamp('max_updateat')->nullable();
            $table->string('max_kode', 20)->nullable();
            $table->string('currency_id', 20)->nullable();
            $table->unsignedBigInteger('satuan_kerja_id')->nullable();
            $table->string('cp_title', 50)->nullable();
            $table->boolean('edit_profil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
