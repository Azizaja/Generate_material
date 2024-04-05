<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Dokumentasi;
use App\Models\SatuanKerja;
use App\Models\PerusahaanBlacklist;
use App\Models\PerusahaanAdministrasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PerusahaanIjinUsahaHelper;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $guarded = ['id'];

    //jenis perusahaan
    const JENIS_VENDOR_PERUSAHAAN_BESAR        = 0;
    const JENIS_VENDOR_PERUSAHAAN_KECIL        = 1;
    const JENIS_VENDOR_PERORANGAN                    = 2;

    //status rule vendor
    const STATUS_PENDREV        = 1;
    const STATUS_RAISED            = 2;
    const STATUS_REVISION        = 3;
    const STATUS_ADMREV            = 4;
    const STATUS_COMPLREV        = 5;
    const STATUS_BPOREV            = 6;
    const STATUS_HODREV            = 7;
    const STATUS_APPR            = 8;
    const STATUS_KADALUARSA             = 9;
    const STATUS_SIAP_DIAJUKAN          = 10;
    const STATUS_MENUNGGU_APPROVAL      = 11;
    const STATUS_TAHAP_PERTAMA            = 12;
    const STATUS_VERIFIKASI_LANJUTAN    = 13;
    const STATUS_REVISIFORM                = 14;
    const STATUS_REVISI                    = 15;
    const  STATUS_SUDAH_REVISI             = 16;
    const STATUS_MELAKUKAN_REVISI         = 17;

    //status dri
    const STATUS_DISETUJUI              = 101;
    const STATUS_DITOLAK        = 102;

    //status akreditasi
    const STATUS_PREFF        = 20;
    const STATUS_TRIAL        = 40;
    const STATUS_ACCON        = 60;
    const STATUS_FAIL            = 80;
    const STATUS_DELST        = 100;

    // status Dokumen
    const TIDAK_ADA                                    = 0;
    const ADA_BELUM_TERVEFIRIKASI    = 1;
    const ADA_TERVERIFIKASI                    = 2;
    const ADA_PERUBAHAN                        = 3;
    const ADA_TERVALIDASI                        = 4;
    const VERIF_PERTAMA                         = 5;

    public function satuanKerja(): BelongsTo
    {
        return $this->belongsTo(SatuanKerja::class, 'satuan_kerja_id');
    }
    public function getStatusDrt()
    {
        $nomor_drt = '';
        $result = Perusahaan::getMessageDRT();
        if ($result['status']) {
            return '<span class="badge badge-primary">' . $result['message'] . ' </span>';
        } else {
            return '<span class="badge badge-danger">' . $result['message'] . ' </span>';
        }
    }

    public function getDppTanggalBerlaku($format = 'Y-m-d')
    {
        if ($this->dpp_tanggal_berlaku === null || $this->dpp_tanggal_berlaku === '') {
            return null;
        }

        // Gunakan Carbon untuk mengonversi tanggal
        $carbonDate = Carbon::createFromFormat('Y-m-d', $this->dpp_tanggal_berlaku);

        // Ubah format tanggal sesuai dengan argumen yang diberikan
        return $carbonDate->format($format);
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
                    $dokumenExpire = $this->getArrayDokumenExpire();
                    if (count($dokumenExpire) > 0) {
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

    public function onPerusahaanBlacklist($tipe = null)
    {
        $query = PerusahaanBlacklist::where('perusahaan_id', $this->id)
            ->where('status', 0);

        if ($tipe) {
            $query->where('tipe', $tipe);
        }

        if (!$query->get()->isEmpty()) {
            return $query->get();
        }
        return null;
    }
    public function getArrayDokumenExpire()
    {
        $nextMonth = Carbon::now()->addMonth()->startOfMonth()->toDateString();

        $data = [];

        // Ambil data Perusahaan Administrasi
        $perusahaan_administrasi = PerusahaanAdministrasi::where('perusahaan_id', $this->id)->first();

        if ($perusahaan_administrasi) {
            if ($perusahaan_administrasi->iujk_nomor && $perusahaan_administrasi->iujk_tanggal_berlaku < $nextMonth) {
                $data[Dokumentasi::JENIS_PERUSAHAAN_IUJK] = Carbon::parse($perusahaan_administrasi->iujk_tanggal_berlaku)->format('d M Y');
            }
            if ($perusahaan_administrasi->siup_nomor && $perusahaan_administrasi->siup_tanggal_berlaku < $nextMonth) {
                $data[Dokumentasi::JENIS_PERUSAHAAN_SIUP] = Carbon::parse($perusahaan_administrasi->siup_tanggal_berlaku)->format('d M Y');
            }
        }

        // Ambil data Perusahaan Ijin Usaha
        $perusahaan_ijinusahas = PerusahaanIjinusaha::where('perusahaan_id', $this->id)->get();

        foreach ($perusahaan_ijinusahas as $perusahaan_ijinusaha) {
            $non_expire = PerusahaanIjinUsahaHelper::getTipeNonExpire();
            if (in_array($perusahaan_ijinusaha->jenis, $non_expire)) {
                continue;
            }
            if ($perusahaan_ijinusaha->tanggal_berlaku < $nextMonth) {
                $data[$perusahaan_ijinusaha->jenis] = Carbon::parse($perusahaan_ijinusaha->tanggal_berlaku)->format('d M Y');
            }
        }

        return $data;
    }

    public function isKontrakTerakhirMelebihiBatasTigaTahun()
    {
        $threeYearsAgo = now()->subYears(3);

        $daftarpekerjaan = PekerjaanPemenang::join('penawaran', 'penawaran.id', '=', 'pekerjaan_pemenang.penawaran_id')
            ->where('penawaran.perusahaan_id', $this->id)
            ->get();

        if ($daftarpekerjaan->isNotEmpty()) {
            foreach ($daftarpekerjaan as $dp) {
                if ($dp->created_at < $threeYearsAgo) {
                    return true;
                }
            }

            return false;
        }

        return false;
    }
}
