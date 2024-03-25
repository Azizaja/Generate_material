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
        Schema::create('penawaran', function (Blueprint $table) {
            $table->id();
            $table->timestamp('waktu', 6);
            $table->decimal('nilai_akhir', 20, 2)->nullable();
            $table->string('nilai_terenkripsi')->nullable();
            $table->string('nilai_terenkripsi2', 128)->nullable();
            $table->string('amplop_enkripsi_penyedia')->nullable();
            $table->string('amplop_enkripsi_panitia')->nullable();
            $table->string('tanda_tangan')->nullable();
            $table->decimal('nilai_negosiasi', 20, 2)->nullable();
            $table->decimal('nilai_terdekripsi', 20, 2)->nullable();
            $table->decimal('pembuka_enkripsi', 3, 0)->nullable();
            $table->decimal('nilai_teknis', 5, 2)->nullable();
            $table->decimal('urutan', 3, 0)->nullable();
            $table->decimal('urutan_teknis', 3, 0)->nullable();
            $table->decimal('status', 3, 0);
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('pengadaan_id');
            $table->unsignedBigInteger('file_berkas_id')->nullable();
            $table->unsignedBigInteger('file_session_id')->nullable();
            $table->decimal('tipe_penawaran')->nullable();
            $table->decimal('state')->nullable();
            $table->timestamps();
            $table->decimal('nilai_ekonomis_panitia', 22, 2)->nullable();
            $table->string('no_surat_negosiasi', 100)->nullable();
            $table->timestamp('tgl_surat_negosiasi')->nullable();
            $table->bigInteger('nilai_aritmatik')->default(0);
            $table->string('currency_id')->nullable();
            $table->decimal('currency_value', 20, 2)->nullable();
            $table->decimal('seq', 20, 0)->nullable();
            $table->decimal('ongkos_angkut', 22, 2)->nullable();
            $table->string('ongkos_angkut_terenkripsi', 128)->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('freight_type')->nullable();
            $table->integer('origin_country')->nullable();
            $table->decimal('currency_value_pembukaan', 22, 2)->nullable();
            $table->decimal('currency_value_negosiasi', 22, 2)->nullable();
            $table->decimal('nilai_negosiasi_vendor', 22, 2)->nullable();
            $table->decimal('nilai_akhir_perhitungan', 22, 2)->nullable();
            $table->smallInteger('freight_cost_status')->default(0)->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('ship_via')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('fob_point')->nullable();
            $table->string('freight_term')->nullable();
            $table->decimal('nilai_justifikasi', 22, 2)->nullable();
            $table->decimal('nilai_justifikasi_vendor', 22, 2)->nullable();
            $table->decimal('nilai_negosiasi_panitia', 22, 2)->nullable();
            $table->decimal('justifikasi_bm', 22, 2)->nullable();
            $table->decimal('justifikasi_ppn', 22, 2)->nullable();
            $table->decimal('justifikasi_pph', 22, 2)->nullable();
            $table->smallInteger('seq_negosiasi')->default(1);
            $table->smallInteger('status_nego_panitia')->default(0);
            $table->smallInteger('status_nego_vendor')->default(0);
            $table->string('no_surat_penawaran', 255)->nullable();
            $table->decimal('budget', 22, 2)->nullable();
            $table->char('flag_penawar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran');
    }
};
