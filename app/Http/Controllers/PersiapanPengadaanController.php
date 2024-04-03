<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\MasterTahap;
use App\Models\MetodePengadaan;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\PenawaranRincian;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Services\UserService;

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
        return view('persiapanPengadaan.undangPenyediaPengadaan', [
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiKualifikasi()
    {
        return view('persiapanPengadaan.persyaratanPengadaan.konfigurasiKualifikasi');
    }

    public function showKonfigurasiKewajaran()
    {
        return view('persiapanPengadaan.persyaratanPengadaan.konfigurasiKewajaran');
    }

    public function showKonfigurasiAdministrasi()
    {
        return view('persiapanPengadaan.persyaratanPengadaan.konfigurasiAdministrasi');
    }

    public function showKonfigurasiTeknis()
    {
        return view('persiapanPengadaan.persyaratanPengadaan.konfigurasiTeknis');
    }

    public function ShowSAPRFQ()
    {
        return view('RFQ.index');
    }

    public function ShowDetailRFQ()
    {
        return view('RFQ.detailRFQ');
    }
}
