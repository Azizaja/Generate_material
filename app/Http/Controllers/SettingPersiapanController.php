<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\MCommodity;
use App\Models\MetodePengadaan;
use App\Models\MSubCommodity;
use App\Models\Pekerjaan;
use App\Models\SubBidang;
use Illuminate\Http\Request;

class SettingPersiapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settingPersiapanPengadaan.index',[
            'detail_pekerjaan' => Pekerjaan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       return view('settingPersiapanPengadaan.index', [
        'pekerjaans' => Pekerjaan::all(),
            'detail_pekerjaan' => Pekerjaan::find($id),
            'bidang_materials' => Bidang::select('id', 'kode','nama')
            ->where('is_deleted', 0)
            ->orderBy('nama', 'asc')
            ->get(),
            'sub_bidang_materials' => SubBidang::select('id', 'kode','nama')
            ->where('is_deleted', 0)
            ->orderBy('nama', 'asc')
            ->get(),
            'metode_pengadaans' => MetodePengadaan::select('id', 'kode','nama')
            ->orderBy('nama', 'asc')
            ->get(),
            'group_materials' => MCommodity::select('id', 'kode','nama')
            ->orderBy('nama', 'asc')
            ->get(),
            'materials' => MSubCommodity::select('id', 'kode','nama')
            ->orderBy('nama', 'asc')
            ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
