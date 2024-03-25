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
        Schema::create('pekerjaan_rincian', function (Blueprint $table) {
            $table->id();
            $table->integer('tipe');
            $table->string('nama')->nullable();
            $table->decimal('volume', 21, 3);
            $table->decimal('volume_realisasi', 21, 3)->nullable();
            $table->string('satuan')->nullable();
            $table->unsignedBigInteger('pekerjaan_id')->nullable();
            $table->decimal('pajak', 6, 2)->nullable();
            $table->decimal('pajak_bm', 6, 2)->nullable();
            $table->decimal('harga_satuan', 20, 2);
            $table->decimal('harga_satuan_oe', 20, 2);
            $table->unsignedBigInteger('state')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('spesifikasi2')->nullable();
            $table->string('noupb', 50)->nullable();
            $table->string('nosdkal', 60)->nullable();
            $table->string('nohps', 60)->nullable();
            $table->string('kodedistrik', 5)->nullable();
            $table->string('kodebarang')->nullable();
            $table->string('noreq', 50)->nullable();
            $table->string('stockcode', 50)->nullable();
            $table->string('tipereq', 2)->nullable();
            $table->string('nowo', 50)->nullable();
            $table->string('wodesc', 40)->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('dsrusulan')->nullable();
            $table->timestamp('tglreq', 6)->nullable();
            $table->timestamp('tglkebutuhan', 6)->nullable();
            $table->string('kode_anggaran', 50)->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();
            $table->string('subnohps', 50)->nullable();
            $table->integer('idtampil')->nullable();
            $table->string('preq_no', 50)->nullable();
            $table->string('preq_item_no', 50)->nullable();
            $table->text('franco')->nullable();
            $table->decimal('ongkos_angkut', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_hps', 20, 2)->nullable();
            $table->decimal('ongkos_angkut_pajak', 20, 2)->nullable();
            $table->integer('commodity')->nullable();
            $table->integer('sub_commodity')->nullable();
            $table->integer('pr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_rincian');
    }
};
