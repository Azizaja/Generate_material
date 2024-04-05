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
        Schema::create('perusahaan_administrasi', function (Blueprint $table) {
            $table->bigInteger('perusahaan_id')->unsigned()->primary();
            $table->string('iujk_nomor')->nullable();
            $table->timestamp('iujk_tanggal_berlaku')->nullable();
            $table->string('iujk_instansi')->nullable();
            $table->string('siup_nomor')->nullable();
            $table->timestamp('siup_tanggal_berlaku')->nullable();
            $table->string('siup_instansi')->nullable();
            $table->string('akta_nomor')->nullable();
            $table->timestamp('akta_tanggal_berlaku')->nullable();
            $table->string('akta_notaris')->nullable();
            $table->string('akta_perubahan_nomor')->nullable();
            $table->timestamp('akta_perubahan_tanggal_berlaku')->nullable();
            $table->string('akta_perubahan_notaris',)->nullable();
            $table->string('nomor_pelunasan_pajak_akhir')->nullable();
            $table->timestamp('tanggal_pelunasan_pajak_akhir')->nullable();
            $table->timestamp('tanggal_neraca')->nullable();
            $table->decimal('neraca_aktiva_lancar', 20, 2)->nullable();
            $table->decimal('neraca_aktiva_tetap', 20, 2)->nullable();
            $table->decimal('neraca_aktiva_lain', 20, 2)->nullable();
            $table->decimal('neraca_pasiva_pendek', 20, 2)->nullable();
            $table->decimal('neraca_pasiva_panjang', 20, 2)->nullable();
            $table->string('laporan_pph_1_nomor')->nullable();
            $table->timestamp('laporan_pph_1_tanggal')->nullable();
            $table->string('laporan_pph_2_nomor')->nullable();
            $table->timestamp('laporan_pph_2_tanggal')->nullable();
            $table->string('laporan_pph_3_nomor')->nullable();
            $table->timestamp('laporan_pph_3_tanggal')->nullable();
            $table->string('laporan_ppn_1_nomor')->nullable();
            $table->timestamp('laporan_ppn_1_tanggal')->nullable();
            $table->string('laporan_ppn_2_nomor')->nullable();
            $table->timestamp('laporan_ppn_2_tanggal')->nullable();
            $table->string('laporan_ppn_3_nomor')->nullable();
            $table->timestamp('laporan_ppn_3_tanggal')->nullable();
            $table->integer('state')->nullable();
            $table->timestamps();
            $table->bigInteger('fid_iujk')->nullable();
            $table->bigInteger('fid_siup')->nullable();
            $table->bigInteger('fid_akta')->nullable();
            $table->bigInteger('fid_ubah_akta')->nullable();
            $table->bigInteger('fid_pajak')->nullable();
            $table->bigInteger('fid_neraca')->nullable();
            $table->bigInteger('fid_ppn')->nullable();
            $table->bigInteger('fid_pph')->nullable();
            $table->bigInteger('fid_tanda_tangan')->nullable();
            $table->bigInteger('fid_stempel')->nullable();
            $table->bigInteger('fid_stempel_gabung')->nullable();
            $table->decimal('siup_kekayaan', 20, 2)->nullable();
            $table->integer('flag_validasi_iujk')->nullable();
            $table->integer('flag_validasi_siup')->nullable();
            $table->integer('flag_validasi_akta')->nullable();
            $table->integer('flag_validasi_neraca')->nullable();
            $table->integer('flag_validasi_spt')->nullable();
            $table->bigInteger('fid_labarugi')->nullable();
            $table->string('siup_skala')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_administrasi');
    }
};
