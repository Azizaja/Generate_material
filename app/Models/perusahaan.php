<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $guarded = ['id'];

    public function satuanKerja(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuan_kerja_id');
    }
    public function getStatusDrt()
    {
        $nomor_drt = '';
        $result = $this->getMessageDRT();
        if ($result['status']) {
            return '<span class="badge badge-info" lang="id">' . $result['message'] . '</span>';
        } else {
            return '<span class="badge badge-warning" lang="id">' . $result['message'] . '</span>';
        }
    }
    public function getMessageDRT()
    {
        $nomor_drt = [];

        // Ambil maksimum kode
        $maxKode = $this->max_kode;

        // Cek apakah sudah terdaftar
        if ($maxKode) {
            // Cek apakah tanggal berlaku kadaluarsa
            if ($this->getDppTanggalBerlaku() <= Carbon::now()->format('Y-m-d')) {
                $nomor_drt = ['status' => false, 'message' => 'Tidak aktif'];
            } else {
                // Cek apakah vendor berada dalam blacklist
                if ($this->onPerusahaanBlacklist()) {
                    $nomor_drt = ['status' => false, 'message' => 'Tidak aktif (Blacklist)'];
                } else {
                    // Cek apakah ada dokumen yang telah kedaluwarsa
                    if ($this->isDokumenAdaYangMati()) {
                        $nomor_drt = ['status' => false, 'message' => 'Tidak aktif (Dokumen Expired)'];
                    } else {
                        // Cek apakah kontrak terakhir lebih dari 3 tahun yang lalu
                        if ($this->isKontrakTerakhirMelebihiBatasTigaTahun()) {
                            $nomor_drt = ['status' => false, 'message' => 'Tidak aktif (Jeda Kontrak Terakhir Melebihi Masa 3 Tahun)'];
                        } else {
                            $nomor_drt = ['status' => true, 'message' => 'Aktif'];
                        }
                    }
                }
            }
        } else {
            $nomor_drt = ['status' => true, 'message' => 'belum terdaftar'];
        }

        return $nomor_drt;
    }


    public function getDppTanggalBerlaku($format = 'Y-m-d')
    {
        if ($this->dpp_tanggal_berlaku === null || $this->dpp_tanggal_berlaku === '') {
            return null;
        }

        // Gunakan Carbon untuk mengonversi tanggal
        $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->dpp_tanggal_berlaku);

        // Ubah format tanggal sesuai dengan argumen yang diberikan
        return $carbonDate->format($format);
    }
}
