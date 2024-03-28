<?php

use App\Http\Controllers\AksesPelaksanaPengadaanController;
use App\Http\Controllers\PersiapanPengadaanController;
use App\Http\Controllers\SettingPersiapanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/persiapan-pengadaan', [PersiapanPengadaanController::class, 'index'])->name('persiapan-pengadaan.index');
Route::get('/persiapan-pengadaan/show/{id}', [PersiapanPengadaanController::class, 'showPekerjaan'])->name('persiapan-pengadaan.show');
Route::get('persiapan-pengadaan/undangan', [PersiapanPengadaanController::class, 'showUndanganPenyedia'])->name('persiapan-pengadaan.undangan');
Route::get('persiapan-pengadaan/konfigurasi-kualifikasi', [PersiapanPengadaanController::class, 'showKonfigurasiKualifikasi'])->name('persiapan-pengadaan.konfigurasi-kualifikasi');
Route::get('persiapan-pengadaan/konfigurasi-kewajaran', [PersiapanPengadaanController::class, 'showKonfigurasiKewajaran'])->name('persiapan-pengadaan.konfigurasi-kewajaran');
Route::get('persiapan-pengadaan/konfigurasi-administrasi', [PersiapanPengadaanController::class, 'showKonfigurasiAdministrasi'])->name('persiapan-pengadaan.konfigurasi-administrasi');
Route::get('persiapan-pengadaan/konfigurasi-teknis', [PersiapanPengadaanController::class, 'showKonfigurasiTeknis'])->name('persiapan-pengadaan.konfigurasi-teknis');
Route::get('persiapan-pengadaan/sap', [PersiapanPengadaanController::class, 'showSAPRFQ'])->name('persiapan-pengadaan.sap');
Route::get('persiapan-pengadaan/detailRFQ', [PersiapanPengadaanController::class, 'showDetailRFQ'])->name('persiapan-pengadaan.detailRFQ');
Route::resource('setting-persiapan', SettingPersiapanController::class);
Route::resource('akses-pelaksana-pengadaan', AksesPelaksanaPengadaanController::class);
