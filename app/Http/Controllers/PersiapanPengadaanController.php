<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\KualifikasiGroupDetail;
use App\Models\MasterTahap;
use App\Models\MetodePengadaan;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\PenawaranRincian;
use App\Models\Perusahaan;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Services\UserService;
use App\Models\SubBidang;
use Illuminate\Support\Facades\DB;
use App\Models\Bidang;
use App\Models\MaxRfq;

class PersiapanPengadaanController extends Controller
{
    // protected $userService;

    // public function __construct(UserService $userService)
    // {
    //     $this->userService = $userService;
    // }

    public function index()
    {
        return view('persiapanPengadaan.index', [
            'pekerjaans' => Pekerjaan::all(),
        ]);
    }

    public function showPekerjaan($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $tabPersyaratans = [];
        $multi_pemenang = null;
        $show_bobot = null;

        if ($pekerjaan->status_multi_pemenang == 1) {
            $multi_pemenang = true;
            if (config('app.multi_pemenang.bobot') == 1) {
                $show_bobot = true;
            } else {
                $show_bobot = false;
            }
        } else {
            $multi_pemenang = false;
            $show_bobot = false;
        }

        $metode_pengadaan = MetodePengadaan::find($pekerjaan->metode_pengadaan_id);

        if ($metode_pengadaan) {
            $masterTahap = MasterTahap::where('master_metode_pengadaan_id', $metode_pengadaan->master_metode_pengadaan_id)->get();

            foreach ($masterTahap as $tahap) {
                if ($tahap->evaluasi_id > 0) {
                    $evaluasi = Evaluasi::find($tahap->evaluasi_id);
                    if ($evaluasi) {
                        if ($show_bobot) {
                            if (($tahap->evaluasi_id != Evaluasi::TEKNIS) && ($tahap->evaluasi_id != Evaluasi::NILAI_TEKNIS)) {
                                $tabPersyaratans[] = $tahap->evaluasi;
                            }
                        } else {
                            $tabPersyaratans[] = $tahap->evaluasi;
                        }
                    }
                }
            }
            // if ($show_bobot) {
            //     $evaluasi = Evaluasi::find(Evaluasi::NILAI_TEKNIS_BARANG);
            //     if ($evaluasi) {
            //         $arrEvaluasi[] = $evaluasi;
            //     }
            // }
        }
        DebugBar::info($tabPersyaratans);
        return view('persiapanPengadaan.showPersiapanPengadaan', [
            'pekerjaans' => Pekerjaan::all(),
            'detail_pekerjaan' => Pekerjaan::find($id),
            'multi_pemenang' => $multi_pemenang,
            'show_bobot' => $show_bobot,
            'tabPersyaratans' => $tabPersyaratans,
        ]);
    }
    public function showUndanganPenyedia($id)
    {
        // if ($this->divisi_id > 0) {
        //     $c->add(PerusahaanPeer::SATUAN_KERJA_ID, $this->divisi_id);
        // }

        $query = Perusahaan::query();

        $sql_calon_diundang = Pekerjaan::find($id)->getSqlCalonPenyediaDiundang99();

        if ($sql_calon_diundang) {
            $penyedias = $query->whereIn('ID', array_column(DB::select($sql_calon_diundang), 'PERUSAHAAN_ID'))
                ->where(function ($query) {
                    $query->where('status_rule', Perusahaan::STATUS_APPR)
                        ->orWhere('status_rule', Perusahaan::STATUS_DISETUJUI)
                        ->orWhere('status_rule', Perusahaan::STATUS_MENUNGGU_APPROVAL);
                })
                ->orderBy('nama', 'asc')
                ->get();
        } else {
            $penyedias = $query->where('STATUS_RULE', Perusahaan::STATUS_APPR)
                ->orWhere('STATUS_RULE', Perusahaan::STATUS_DISETUJUI)
                ->orWhere('STATUS_RULE', Perusahaan::STATUS_MENUNGGU_APPROVAL)
                ->orderBy('NAMA')
                ->get();
        }


        //DebugBar::info($penyedias, Pekerjaan::find($id)->perusahaanDiundang);

        return view('persiapanPengadaan.undangPenyediaPengadaan', [
            'detail_pekerjaan' => Pekerjaan::find($id),
            'penyedias' => $penyedias,
        ]);
    }

    public function showKonfigurasiKualifikasi($id)
    {
        
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiKualifikasi',[
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiKewajaran($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiKewajaran',[
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiAdministrasi($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiAdministrasi',[
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiTeknis($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiTeknis',[
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function ShowSAPRFQ()
    {
        return view('RFQ.index', [
            'rfqs' => MaxRfq::all(),
        ]);
    }

    public function ShowDetailRFQ($id)
    {
        return view('RFQ.detailRFQ', [
            'rfq' => MaxRfq::find($id),
        ]);
    }
}
