<?php

namespace App\Http\Controllers;

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
        //$p = PenawaranRincian::where('nama', 'SHORT CHAIR')->limit(5)
        //dd($p);
        //$p = Pekerjaan::find(20914);
        //Debugbar::info($currency_value);
        return view('persiapanPengadaan.showPersiapanPengadaan', [
            'pekerjaans' => Pekerjaan::all(),
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }
    public function showUndanganPenyedia()
    {
        return view('persiapanPengadaan.undangPenyediaPengadaan');
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
