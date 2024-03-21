<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Services\UserService;

class PersiapanPengadaanController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('persiapanPengadaan.index', [
            'pekerjaans' => Pekerjaan::all(),
        ]);
    }

    public function showPekerjaan($id)
    {
        $currency_code = "USD";
        $currency_value = $this->userService->getCurrencyValue($currency_code);

        $p = Pekerjaan::find(20914);
        //dd($p);
        Debugbar::info($currency_value);
        return view('persiapanPengadaan.showPersiapanPengadaan', [
            'pekerjaans' => Pekerjaan::all(),
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }
    public function showUndanganPenyedia()
    {
        return view('persiapanPengadaan.undangPenyediaPengadaan');
    }
}
