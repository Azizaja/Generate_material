<?php

namespace App\Models;

use App\Models\Bidang;
use App\Models\SatuanKerja;
use App\Models\ApplicationUser;
use App\Models\MetodePengadaan;
use App\Models\PekerjaanPanitia;
use App\Models\PekerjaanRincian;
use App\Models\PenawaranRincian;
use App\Models\PekerjaanSubBidang;
use App\Models\PekerjaanSubCommodity;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';

    protected $guarded = ['id'];

    const STATUS_SEMUA = -1;
    const STATUS_PERENCANAAN = 0;
    const STATUS_MENUNGGU_PERSETUJUAN_PENGGUNA_ANGGARAN = 10;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG = 25;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_ANGGARAN = 30;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG_KEUANGAN = 35;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG_SDM = 37;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI = 40;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_OE = 43;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_OE_OPL = 45;
    const STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN = 50;
    const STATUS_MENUNGGU_PERSETUJUAN_URUSAN_P2BJ = 55;
    const STATUS_DISETUJUI = 90;
    //pjb
    const STATUS_BERJALAN = 1;
    const STATUS_BATAL = 2;
    const STATUS_SELESAI_PENGADAAN = 100;
    //end pjb
    //record untuk history
    const STATUS_REGISTER = 60;
    const STATUS_PENETAPAN = 65;
    const STATUS_BATAL_REGISTER = 70;

    const STAT_MULTI_PEMENANG = 'true';
    const STAT_NON_MULTI_PEMENANG = 'false';
    const STATUS_REV = 1;
    const STATUS_REV_FREEZE = 13;

    const METODE_KONTRAK_LUMPSUM = 1;
    const METODE_KONTRAK_RINCIAN = 2;
    const METODE_KONTRAK_GABUNGAN = 3;
    const METODE_KONTRAK_PROSENTASE = 4;
    const METODE_KONTRAK_TERIMA_JADI = 5;
    const METODE_KONTRAK_LOI = 6;

    public function pekerjaanPanitia(): HasMany
    {
        return $this->hasMany(PekerjaanPanitia::class, 'pekerjaan_id', 'id');
    }

    // public function applicationUsers()
    // {
    //     return $this->hasManyThrough(
    //         ApplicationUser::class,
    //         PekerjaanPanitia::class,
    //         'pekerjaan_id', // Foreign key dari tabel pekerjaan_panitia
    //         'id', // Local key dari tabel pekerjaan
    //         'id', // Foreign key dari tabel application_user
    //         'user_id' // Local key dari tabel pekerjaan_panitia
    //     );
    // }

    public function metodePengadaan(): HasOne
    {
        return $this->hasOne(MetodePengadaan::class, 'id', 'metode_pengadaan_id');
    }

    public function satuanKerja(): HasOne
    {
        return $this->hasOne(SatuanKerja::class, 'id', 'satuan_kerja_id');
    }

    public function bidang(): HasMany
    {
        return $this->hasMany(Bidang::class, 'id', 'bidang_id');
    }

    public function pekerjaanSubBidang(): HasMany
    {
        return $this->hasMany(PekerjaanSubBidang::class, 'pekerjaan_id', 'id');
    }

    public function pekerjaanSubCommodity(): HasMany
    {
        return $this->hasMany(PekerjaanSubCommodity::class, 'pekerjaan_id', 'id');
    }

    public function pekerjaanRincian(): HasMany
    {
        return $this->hasMany(PekerjaanRincian::class, 'pekerjaan_id', 'id');
    }

    public static function getMetodeKontrak($metode)
    {
        $texts = [
            self::METODE_KONTRAK_LUMPSUM => 'Lumpsum',
            self::METODE_KONTRAK_RINCIAN => 'Harga Satuan',
            self::METODE_KONTRAK_GABUNGAN => 'Gabungan Lumpsum dan Harga Satuan',
            self::METODE_KONTRAK_PROSENTASE => 'Prosentase',
            self::METODE_KONTRAK_TERIMA_JADI => 'Terima Jadi (Turnkey)',
            self::METODE_KONTRAK_LOI => 'Repeat Order/LOI',
        ];

        return $texts[$metode] ?? NULL;
    }

    public static function getPrNumberString($pekerjaan_id)
    {
        $results = PekerjaanRincian::join('MAX_PR', 'PEKERJAAN_RINCIAN.PR_ID', '=', 'MAX_PR.ID')
            ->where('PEKERJAAN_ID', $pekerjaan_id)
            ->groupBy('PR_NO')
            ->selectRaw('PR_NO, COUNT(PR_NO) AS JUMLAH')
            ->get();

        $str_prnumber = '';

        foreach ($results as $key => $result) {
            $prnumber = $result->PR_NO;
            $prnumber_count = $result->JUMLAH;

            $str_prnumber .= $prnumber . " (" . $prnumber_count . ")";

            if ($key < count($results) - 1) {
                $str_prnumber .= ", ";
            }
        }

        return ($str_prnumber);
    }
    public static function getHpsRincian($pekerjaan_rincian_nama)
    {
        $rincianHPS = PenawaranRincian::whereRaw("nama LIKE '%" . $pekerjaan_rincian_nama . "%'")
            ->whereNotNull('harga_satuan_negosiasi')
            ->limit(5)
            ->orderBy('harga_satuan_negosiasi')
            ->get();

        return ($rincianHPS);
    }
}
