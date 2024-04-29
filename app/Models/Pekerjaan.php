<?php

namespace App\Models;

use App\Models\Bidang;
use App\Models\Perusahaan;
use App\Models\SatuanKerja;
use App\Models\PekerjaanLog;
use App\Models\ApplicationUser;
use App\Models\MetodePengadaan;
use App\Models\PekerjaanPanitia;
use App\Models\PekerjaanRincian;
use App\Models\PenawaranRincian;
use PekerjaanPanitiaAksesHelper;
use App\Models\PekerjaanSubBidang;
use App\Models\PerusahaanDiundang;
use Illuminate\Support\Facades\DB;
use App\Models\PekerjaanPanitiaAkses;
use App\Models\PekerjaanSubCommodity;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    const STATUS_PERUSAHAAN_SESUAI_SPEC = 1;
    const STATUS_PERUSAHAAN_TIDAK_SESUAI_SPEC = 2;
    const STATUS_PEKERJAAN_RINCIAN_ADDITIONAL_COST = 3;

    const STATUS_PERUSAHAAN_TIDAK_SESUAI_SPEC_BELUM_DIAPPROVE = 3;
    const STATUS_PERUSAHAAN_SESUAI_SPEC_BELUM_DIAPPROVE = 4;

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

    public function perusahaanDiundang(): HasMany
    {
        return $this->hasMany(PerusahaanDiundang::class, 'pekerjaan_id', 'id');
    }

    public function pekerjaanLog(): HasMany
    {
        return $this->hasMany(PekerjaanLog::class, 'pekerjaan_id', 'id');
    }

    public function pekerjaanPersyaratan(): HasMany
    {
        return $this->hasMany(PekerjaanPersyaratan::class, 'pekerjaan_id', 'id');
    }

    public function klasifikasi(): HasOne
    {
        return $this->hasOne(Klasifikasi::class, 'id', 'klasifikasi_id');
    }

    public function isAllowedDelete()
    {
        $akses_hapus = PekerjaanPanitiaAksesHelper::isAllowed($this, PekerjaanPanitiaAkses::AKSES_HAPUS_PEKERJAAN);
        if ($akses_hapus && $this->isAllowedView()) {
            return true;
        }
        return false;
    }

    public function isAllowedView()
    {
        $tipeUser = 5;
        $nama = 'Purchaser PGPAI 02';
        switch ($tipeUser) {
            case ApplicationUser::TIPE_PANITIA:
                $panitias = $this->getPanitia();
                if ($panitias) {
                    if ($this->isPanitia() || $this->created_by == $nama) {
                        return true;
                    }
                } else {
                    if ($this->created_by == $nama) {
                        return true;
                    }
                }
                break;
            case ApplicationUser::TIPE_ADMINISTRATOR_OPERASIONAL:
            case ApplicationUser::TIPE_ADMINISTRATOR_SUPER:
            case ApplicationUser::TIPE_PENGELOLA_ADMIN_LEGAL:
                return true;
                break;
            default:
                return false;
                break;
        }
    }
    public function getPanitia()
    {
        $panitias = PekerjaanPanitia::where('pekerjaan_id', $this->id)
            ->orderBy('jabatan', 'asc');

        return $panitias;
    }

    public function isPanitia()
    {
        $userId = 20301;
        $tipeUser = 5;
        $panitia = PekerjaanPanitia::where('pekerjaan_id', $this->id)
            ->where('user_id', $userId)
            ->first();
        if ($panitia) {
            return true;
        }
        return false;
    }

    public static function getCurrencyArray()
    {
        return array(
            'IDR' => 'IDR',
            'USD' => 'USD',
        );
    }

    public function getSqlCalonPenyediaDiundang2()
    {
        $pekerjaan_id = $this->id;
        $pekerjaan_sub_bidangs = $this->pekerjaanSubBidang;

        $sqlQueries = [];

        if ($pekerjaan_sub_bidangs->isNotEmpty()) {
            foreach ($pekerjaan_sub_bidangs as $pekerjaan_sub_bidang) {
                $subBidangId = $pekerjaan_sub_bidang->subBidang->id;
                echo 'subBidangId = ' . $subBidangId;
                $kualifikasiGroupDetailId = optional($pekerjaan_sub_bidang->kualifikasiGroupDetail)->id;
                echo 'kualifikasiGroupDetailId = ' . $kualifikasiGroupDetailId;

                $query = DB::table('perusahaan_spesifikasi')
                    ->select('perusahaan_id')
                    ->where('sub_bidang_id', $subBidangId);

                if ($kualifikasiGroupDetailId) {
                    $query->where('kualifikasi_group_detail_id', '>=', $kualifikasiGroupDetailId);
                }

                $sqlQueries[] = $query->toSql();
            }
        }

        return implode(' UNION ', $sqlQueries);
    }
    public function getCalonPenyediaDiundangQuery3($pekerjaan)
    {
        $query = Perusahaan::query()->where('status_rule', Perusahaan::STATUS_APPR)
            ->orWhere('status_rule', Perusahaan::STATUS_DISETUJUI)
            ->orWhere('status_rule', Perusahaan::STATUS_MENUNGGU_APPROVAL)
            ->orderBy('nama', 'asc');

        $pekerjaan_sub_bidangs = $this->pekerjaanSubBidang;

        if ($pekerjaan_sub_bidangs) {
            echo 'pekerjaan_sub_bidangs ada';
            $query->whereIn('id', function ($subQuery) use ($pekerjaan) {
                $subQuery->select('perusahaan_id')
                    ->from('perusahaan_spesifikasi')
                    ->whereIn('sub_bidang_id', function ($subSubQuery) use ($pekerjaan) {
                        $subSubQuery->select('sub_bidang_id')
                            ->from('pekerjaan_sub_bidang')
                            ->where('pekerjaan_id', $pekerjaan->id)
                            ->whereColumn('kualifikasi_group_detail_id', '>=', 'perusahaan_spesifikasi.kualifikasi_group_detail_id');
                    })
                    ->orWhereIn('sub_bidang_id', function ($subSubQuery) use ($pekerjaan) {
                        $subSubQuery->select('sub_bidang_id')
                            ->from('pekerjaan_sub_bidang')
                            ->where('pekerjaan_id', $pekerjaan->id);
                    });
            });
        }

        // $pekerjaan_materials = $this->pekerjaanSubCommodity;
        // if ($pekerjaan_materials) {
        //     echo 'pekerjaan_materials ada';
        //     $query->orWhereIn('id', function ($subQuery) use ($pekerjaan) {
        //         $subQuery->select('perusahaan_id')
        //             ->from('perusahaan_commodity')
        //             ->whereIn('sub_commodity_id', function ($subSubQuery) use ($pekerjaan) {
        //                 $subSubQuery->select('sub_commodity_id')
        //                     ->from('pekerjaan_sub_commodity')
        //                     ->where('pekerjaan_id', $pekerjaan->id);
        //             });
        //     });
        // }

        return $query;
    }
    public function getCalonPenyediaDiundangQuery($pekerjaan)
    {
        $query = Perusahaan::query()->where('status_rule', Perusahaan::STATUS_APPR)
            ->orWhere('status_rule', Perusahaan::STATUS_DISETUJUI)
            ->orWhere('status_rule', Perusahaan::STATUS_MENUNGGU_APPROVAL)
            ->orderBy('nama', 'asc');

        $query->whereIn('id', function ($subQuery) use ($pekerjaan) {
            $subQuery->select('perusahaan_id')
                ->from('perusahaan_spesifikasi')
                ->whereIn('sub_bidang_id', function ($subSubQuery) use ($pekerjaan) {
                    $subSubQuery->select('sub_bidang_id')
                        ->from('pekerjaan_sub_bidang')
                        ->where('pekerjaan_id', $pekerjaan->id)
                        ->whereColumn('kualifikasi_group_detail_id', '>=', 'perusahaan_spesifikasi.kualifikasi_group_detail_id');
                })
                ->orWhereIn('sub_bidang_id', function ($subSubQuery) use ($pekerjaan) {
                    $subSubQuery->select('sub_bidang_id')
                        ->from('pekerjaan_sub_bidang')
                        ->where('pekerjaan_id', $pekerjaan->id);
                });
        });

        // $query->orWhereIn('id', function ($subQuery) use ($pekerjaan) {
        //     $subQuery->select('perusahaan_id')
        //         ->from('perusahaan_commodity')
        //         ->whereIn('sub_commodity_id', function ($subSubQuery) use ($pekerjaan) {
        //             $subSubQuery->select('sub_commodity_id')
        //                 ->from('pekerjaan_sub_commodity')
        //                 ->where('pekerjaan_id', $pekerjaan->id);
        //         });
        // });

        return $query;
    }
    public function test()
    {
        $query = Perusahaan::query();

        if ($this->kategori_id == 0) {
            $sql_calon_diundang = $this->pekerjaan->getSqlCalonPenyediaDiundang();
            if ($sql_calon_diundang) {
                $query->whereIn('id', function ($query) use ($sql_calon_diundang) {
                    $query->select(DB::raw('PERUSAHAAN_ID'))
                        ->from('PERUSAHAAN_SPESIFIKASI')
                        ->whereIn('SUB_BIDANG_ID', $sql_calon_diundang);
                });
            }
        }
        $penyedias = $query->where('STATUS_RULE', Perusahaan::STATUS_APPR)
            ->orWhere('STATUS_RULE', Perusahaan::STATUS_DISETUJUI)
            ->orWhere('STATUS_RULE', Perusahaan::STATUS_MENUNGGU_APPROVAL)
            ->orderBy('NAMA')
            ->get();
    }

    public function getSqlCalonPenyediaDiundang99()
    {
        $pekerjaan_id = $this->id;
        //cek apakah ada bidang/subbidang
        $pekerjaan_sub_bidangs = $this->pekerjaanSubBidang;
        $status_sub_bidang = false;
        $strsql = '';
        if ($pekerjaan_sub_bidangs) {
            $status_sub_bidang = true;
            $strsql_bidang = '';
            $csub = count($pekerjaan_sub_bidangs);
            $i = 1;
            foreach ($pekerjaan_sub_bidangs as $pekerjaan_sub_bidang) {
                if ($pekerjaan_sub_bidang->kualifikasiGroupDetail) {
                    $kualifikasi_group_detail_id = $pekerjaan_sub_bidang->kualifikasiGroupDetail->id;
                }
                if ($pekerjaan_sub_bidang->kualifikasiGroupDetail) {
                    $sql = " SELECT PERUSAHAAN_ID FROM PERUSAHAAN_SPESIFIKASI WHERE SUB_BIDANG_ID =" .
                        $pekerjaan_sub_bidang->sub_bidang_id . " AND KUALIFIKASI_GROUP_DETAIL_ID >= " . $kualifikasi_group_detail_id;
                    $strsql_bidang = $strsql_bidang . $sql;
                } else {
                    $sql = " SELECT PERUSAHAAN_ID FROM PERUSAHAAN_SPESIFIKASI WHERE SUB_BIDANG_ID =" .
                        $pekerjaan_sub_bidang->sub_bidang_id;
                    $strsql_bidang = $strsql_bidang . $sql;
                }
                if ($csub > 1) {
                    if (($i >= 1) && ($i < $csub)) {
                        $strsql_bidang = $strsql_bidang . ' UNION ';
                    }
                }

                $i++;
            }
        }
        //cek apakah ada group material/material
        $pekerjaan_materials = $this->pekerjaanSubCommodity;
        $status_material = false;
        if ($pekerjaan_materials) {
            $status_material = true;
            $strsql_material = '';
            $csub = count($pekerjaan_materials);
            $i = 1;
            foreach ($pekerjaan_materials as $pekerjaan_material) {
                $sql = " SELECT PERUSAHAAN_ID FROM PERUSAHAAN_COMMODITY WHERE SUB_COMMODITY_ID =" .
                    $pekerjaan_material->sub_commodity_id;
                $strsql_material = $strsql_material . $sql;

                if ($csub > 1) {
                    if (($i >= 1) && ($i < $csub)) {
                        $strsql_material = $strsql_material . ' UNION ';
                    }
                }
                $i++;
            }
        }

        if (($strsql_bidang) && ($strsql_material)) {
            $strsql = $strsql_bidang . ' UNION ' . $strsql_material;
        }

        if (($strsql_bidang) && (!$strsql_material)) {
            $strsql = $strsql_bidang;
        }

        if ((!$strsql_bidang) && ($strsql_material)) {
            $strsql = $strsql_material;
        }
        return $strsql;
    }

    public static function getAdaAksesPanitia($pekerjaan_id)
    {
        $pekerjaan_akses_panitias = PekerjaanPanitiaAkses::whereIn('PEKERJAAN_PANITIA_ID', function ($query) use ($pekerjaan_id) {
            $query->select('ID')
                ->from('pekerjaan_panitia')
                ->where('PEKERJAAN_ID', $pekerjaan_id);
        })->get();

        if ($pekerjaan_akses_panitias->isNotEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAllPekerjaanPanitiaAkses()
    {
        $pekerjaan_id = $this->id;
        $pekerjaan_akses_panitias = PekerjaanPanitiaAkses::whereIn('PEKERJAAN_PANITIA_ID', function ($query) use ($pekerjaan_id) {
            $query->select('ID')
                ->from('pekerjaan_panitia')
                ->where('PEKERJAAN_ID', $pekerjaan_id);
        })->get();

        foreach ($pekerjaan_akses_panitias as $v) {
            $v->delete();
        }
    }

    public function getPekerjaanPanitiaByKelompokPanitia($kelompok_panitia = NULL)
    {
        $query = PekerjaanPanitia::query();

        $query->where('pekerjaan_id', $this->id);
        if ($kelompok_panitia) {
            $query->where('kelompok_panitia_id', $kelompok_panitia->id);
        }
        $pekerjaanPanitia = $query->orderBy('urutan', 'asc')->get();

        return $pekerjaanPanitia;
    }
}