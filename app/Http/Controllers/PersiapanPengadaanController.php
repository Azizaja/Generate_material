<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Barryvdh\Debugbar\Facades\Debugbar;

class PersiapanPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('persiapanPengadaan.index', [
            'pekerjaans' => Pekerjaan::all(),
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
    public function show(string $id)
    {
        //
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
    public function showPekerjaan($id)
    {
        $p = Pekerjaan::find(20914);
        //dd($p);
        Debugbar::info($p);
        return view('persiapanPengadaan.showPersiapanPengadaan', [
            'pekerjaans' => Pekerjaan::all(),
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }
}
