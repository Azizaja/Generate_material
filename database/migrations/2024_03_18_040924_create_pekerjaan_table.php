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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->text('alasan_tidak_setuju')->nullable();
            $table->decimal('anggaran', 20, 2);
            $table->decimal('batas_lulus', 5, 2)->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->decimal('bobot_harga')->nullable();
            $table->decimal('bobot_teknis', 5, 2)->nullable();
            $table->string('currency_id')->nullable();
            $table->decimal('currency_value')->nullable();
            $table->decimal('commodity_id')->nullable();
            $table->decimal('hps', 20, 2)->nullable();
            $table->boolean('hps_tampil')->default(false);
            $table->string('import_from', 30)->nullable();
            $table->integer('kualifikasi_id')->nullable();
            $table->text('kode');
            $table->text('kode_ulang')->nullable();
            $table->unsignedBigInteger('klasifikasi_id')->nullable();
            $table->text('lokasi')->nullable();
            $table->tinyInteger('metode_kontrak')->nullable();
            $table->unsignedBigInteger('metode_pengadaan_id')->nullable();
            $table->text('nama');
            $table->string('nopo', 30)->nullable();
            $table->decimal('nomor')->nullable();
            $table->text('no_perkiraan');
            $table->text('no_surat_perintah')->nullable();
            $table->text('other_attr')->nullable();
            $table->unsignedBigInteger('pengguna_anggaran_id');
            $table->unsignedBigInteger('ppk_id')->nullable();
            $table->decimal('ppn', 5, 2);
            $table->integer('requester')->nullable();
            $table->integer('rev_status')->nullable();
            $table->integer('reff_id')->nullable();
            $table->integer('reff_state')->nullable();
            $table->string('pr_num', 255)->nullable();
            $table->unsignedBigInteger('satuan_kerja_id');
            $table->tinyInteger('state')->nullable();
            $table->tinyInteger('status');
            $table->integer('status_approval')->nullable();
            $table->boolean('status_auction')->nullable();
            $table->boolean('status_elektronik')->nullable();
            $table->boolean('status_multi_pemenang')->nullable();
            $table->boolean('status_selesai')->nullable();
            $table->boolean('status_umum')->nullable();
            $table->integer('status_undang_penyedia')->nullable();
            $table->integer('status_register_pekerjaan')->nullable();
            $table->text('sumber_dana')->nullable();
            $table->tinyInteger('tujuan_surat')->nullable();
            $table->smallInteger('undangan_ke')->default(1);
            $table->boolean('use_spec')->nullable();
            $table->integer('tahun');
            $table->string('tahap_approval', 200)->nullable();
            $table->timestamp('tanggal_rencana_pengadaan');
            $table->timestamp('tglpo')->nullable();
            $table->string('created_by', 100);
            $table->string('updated_by', 100);
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan');
    }
};
