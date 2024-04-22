<?php

namespace App\Http\Controllers;

use App\Models\ApplicationUser;
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
use App\Models\MasterPersyaratan;
use App\Models\MaxRfq;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\PekerjaanPanitia;
use PekerjaanHelper;
use Barryvdh\Debugbar\Twig\Extension\Debug;

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

        $request = request();
        $pekerjaan = Pekerjaan::find($id);
        $query = MasterPersyaratan::query();

        if ($pekerjaan->metodePengadaan->sistemPengadaanId == MetodePengadaan::PENUNJUKAN_LANGSUNG) {
            if ($request->input('evaluasi_id') == Evaluasi::ADMINISTRASI) {
                $query->where('evaluasi_id', Evaluasi::ADMINISTRASI)
                    ->orWhere('evaluasi_id', Evaluasi::KUALIFIKASI);
            } else {
                $query->where('evaluasi_id', $request->input('evaluasi_id'));
            }
        } else {
            $query->where('evaluasi_id', $request->input('evaluasi_id'));
        }

        DebugBar::info($query->get());

        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiKualifikasi', [
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiKewajaran($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiKewajaran', [
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiAdministrasi($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiAdministrasi', [
            'detail_pekerjaan' => Pekerjaan::find($id),
        ]);
    }

    public function showKonfigurasiTeknis($id)
    {
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiTeknis', [
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

    public function createPengadaan($id)
    {
        $rfq = MaxRfq::find($id);
        $lines = $rfq->MaxRfqline;

        $no_perkiraan          = $rfq->id;
        $tgl_rencana_pengadaan = date('Y-m-d');
        $anggaran              = 0;
        $sumberdana            = '';
        $lokasi                = '';
        $no_surat_perintah     = '';
        $satuan_kerja_id       = ApplicationUser::find(20300)->id;

        try {
            DB::beginTransaction();

            $item_header = '';
            $service = '';

            // foreach ($lines as $line) {
            //     if ($line->line_type == 'ITEM') {
            //         $item_header = $line->line_desc;
            //     } else {
            //         $service = $line->line_type;
            //     }
            // }

            $pekerjaan = new Pekerjaan();
            $pekerjaan->kode = $rfq->rfq_num;
            $pekerjaan->nama = $rfq->rfq_desc;
            $pekerjaan->no_perkiraan =  $no_perkiraan;
            $pekerjaan->tanggal_rencana_pengadaan = $tgl_rencana_pengadaan;
            $pekerjaan->anggaran = $anggaran;
            $pekerjaan->hps = $anggaran;
            $pekerjaan->pengguna_anggaran_id = ApplicationUser::find(20300)->id; //blm diset
            $pekerjaan->tahun = date('Y');
            $pekerjaan->satuan_kerja_id = $satuan_kerja_id;
            $pekerjaan->ppn = 10; //default PJB
            $pekerjaan->import_from = 'SAP';
            $pekerjaan->status = Pekerjaan::STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN;
            $pekerjaan->currency_id = 'IDR';
            $pekerjaan->currency_value = 1;
            $pekerjaan->created_by = ApplicationUser::find(20300)->nama;
            $pekerjaan->updated_by = ApplicationUser::find(20300)->nama;
            $pekerjaan->save();


            // Creating Panitia automatically
            $pekerjaan_id = $pekerjaan->id;
            PekerjaanHelper::setPanitiaPekerjaan($pekerjaan_id);
            //PekerjaanPanitia::createAksesPanitia($pekerjaan_id);

            // // Linking RFQ-Pekerjaan
            // $rfq->setStatus(MaxRfq::PEKERJAAN);
            // $rfq->setMaxId($pekerjaan_id);
            // $rfq->save();
        } catch (\Exception $e) {
            dump($e);
            DebugBar::info($e);
            DB::rollBack();
        }

        dd($item_header);
    }
}
