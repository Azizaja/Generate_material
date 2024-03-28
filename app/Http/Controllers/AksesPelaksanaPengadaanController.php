<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use PekerjaanPanitiaAksesHelper;

class AksesPelaksanaPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('aksesPelaksanaPengadaan.index', [

            'detail_pekerjaan' => Pekerjaan::find($id),
            'daftarAksesPanitas' => PekerjaanPanitiaAksesHelper::getArrayApprove(),
            Debugbar::info(Pekerjaan::find($id)),
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
