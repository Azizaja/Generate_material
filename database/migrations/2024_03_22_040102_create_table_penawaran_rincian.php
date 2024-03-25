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
        Schema::create('penawaran_rincian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengadaan_rincian_id')->nullable();
            $table->unsignedBigInteger('penawaran_id')->nullable();
            $table->decimal('nilai_akhir', 20, 2)->nullable();
            $table->string('nilai_terenkripsi')->nullable();
            $table->string('amplop_enkripsi_penyedia')->nullable();
            $table->string('amplop_enkripsi_panitia')->nullable();
            $table->string('tanda_tangan')->nullable();
            $table->decimal('nilai_terdekripsi', 20, 2)->nullable();
            $table->decimal('nilai_negosiasi', 20, 2)->nullable();
            $table->unsignedSmallInteger('pembuka_enkripsi')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->timestamps();
            $table->string('nama')->nullable();
            $table->decimal('nilai_teknis', 20, 2)->nullable();
            $table->decimal('urutan', 20, 2)->nullable();
            $table->decimal('urutan_teknis', 20, 2)->nullable();
            $table->decimal('status', 20, 2)->nullable();
            $table->decimal('nilai_ekonomis', 20, 2)->nullable();
            $table->decimal('nilai_ekonomis_panitia', 20, 2)->nullable();
            $table->string('nilai_ekonomis_terenkripsi')->nullable();
            $table->string('amplop_enkripsi_penyedia2')->nullable();
            $table->string('amplop_enkripsi_panitia2')->nullable();
            $table->string('tanda_tangan2')->nullable();
            $table->decimal('harga_satuan', 20, 2)->nullable();
            $table->string('harga_satuan_terenkripsi')->nullable();
            $table->decimal('harga_satuan_terdekripsi', 20, 2)->nullable();
            $table->decimal('harga_satuan_negosiasi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut', 20, 2)->nullable();
            $table->string('ongkos_angkut_terenkripsi')->nullable();
            $table->decimal('ongkos_angkut_terdekripsi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_negosiasi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan', 20, 2)->nullable();
            $table->string('ongkos_angkut_satuan_terenkripsi')->nullable();
            $table->decimal('ongkos_angkut_satuan_terdekripsi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan_negosiasi', 20, 2)->nullable();
            $table->decimal('volume', 20, 2)->nullable();
            $table->string('volume_terenkripsi')->nullable();
            $table->decimal('volume_negosiasi', 20, 2)->nullable();
            $table->decimal('harga_satuan_oa', 20, 2)->nullable();
            $table->decimal('volume_terpenuhi', 20, 2)->nullable();
            $table->boolean('status_terpenuhi')->nullable();
            $table->decimal('skor_total', 20, 2)->nullable();
            $table->string('subpaket', 100)->nullable();
            $table->decimal('harga_satuan_oa_terdekripsi', 20, 2)->nullable();
            $table->double('dimensi_panjang')->nullable();
            $table->double('dimensi_lebar')->nullable();
            $table->double('dimensi_tinggi')->nullable();
            $table->double('berat')->nullable();
            $table->string('ppn_terenkripsi')->nullable();
            $table->decimal('ppn', 20, 2)->nullable();
            $table->string('pph_terenkripsi')->nullable();
            $table->decimal('pph', 20, 2)->nullable();
            $table->decimal('ppn_negosiasi', 20, 2)->nullable();
            $table->decimal('pph_negosiasi', 20, 2)->nullable();
            $table->string('hscode')->nullable();
            $table->string('hscode_terenkripsi')->nullable();
            $table->decimal('harga_satuan_oa_pajak', 20, 2)->nullable();
            $table->decimal('harga_satuan_oa_pajak_terdekripsi', 20, 2)->nullable();
            $table->decimal('nilai_negosiasi_vendor', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_negosiasi_vendor', 20, 2)->nullable();
            $table->decimal('harga_satuan_negosiasi_vendor', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan_negosiasi_vendor', 20, 2)->nullable();
            $table->decimal('bm', 20, 2)->nullable();
            $table->string('bm_terenkripsi')->nullable();
            $table->decimal('bm_negosiasi', 20, 2)->nullable();
            $table->unsignedInteger('freight_cost_status')->nullable();
            $table->decimal('nilai_akhir_perhitungan', 20, 2)->nullable();
            $table->string('preq_no', 50)->nullable();
            $table->string('preq_item_no', 50)->nullable();
            $table->unsignedBigInteger('pr_id')->nullable();
            $table->decimal('nilai_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('nilai_justifikasi_vendor', 20, 2)->nullable();
            $table->decimal('nilai_justifikasi', 20, 2)->nullable();
            $table->decimal('harga_satuan_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('harga_satuan_oa_perhitungan', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_justifikasi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_justifikasi_vendor', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan_justifikasi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan_justifikasi_vendor', 20, 2)->nullable();
            $table->decimal('ppn_terdekripsi', 20, 2)->nullable();
            $table->decimal('ppn_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('ppn_justifikasi', 20, 2)->nullable();
            $table->decimal('pph_terdekripsi', 20, 2)->nullable();
            $table->decimal('pph_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('pph_justifikasi', 20, 2)->nullable();
            $table->decimal('bm_terdekripsi', 20, 2)->nullable();
            $table->decimal('bm_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('bm_justifikasi', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_satuan_negosiasi_panitia', 20, 2)->nullable();
            $table->decimal('delivery_time', 20, 2)->nullable();
            $table->decimal('budget', 22, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran_rincian');
    }
};
