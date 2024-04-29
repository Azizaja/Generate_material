<?php

namespace App\Http\Controllers;

use PekerjaanHelper;
use App\Models\Bidang;
use App\Models\MaxRfq;
use EprocLoggerHelper;
use App\Models\History;
use App\Models\Evaluasi;
use App\Models\Pekerjaan;
use App\Models\SubBidang;
use App\Models\Perusahaan;
use App\Models\Klasifikasi;
use App\Models\Kualifikasi;
use App\Models\MasterTahap;
use PekerjaanPanitiaHelper;
use Illuminate\Http\Request;
use App\Models\ApplicationUser;
use App\Models\MetodePengadaan;
use App\Models\PekerjaanRincian;
use App\Models\PenawaranRincian;
use App\Models\MasterPersyaratan;
use App\Models\PekerjaanSubBidang;
use Illuminate\Support\Facades\DB;
use App\Models\PekerjaanPersyaratan;
use App\Models\Services\UserService;
use App\Models\PekerjaanSubCommodity;
use App\Models\KualifikasiGroupDetail;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use PekerjaanPersyaratanHelper;

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
            'pekerjaans' => Pekerjaan::orderBy('created_at', 'desc')->get(),
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

    public function showKonfigurasi(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        // dd($id);
        $pekerjaan = Pekerjaan::find($id);
        $master_persyaratan_id = MasterPersyaratan::all();
        // dd($pekerjaan->metodePengadaan->sistemPengadaan());

        if ($pekerjaan->metodePengadaan->sistem_pengadaan_id == MetodePengadaan::PENUNJUKAN_LANGSUNG) {
            if ($request->evaluasi == Evaluasi::ADMINISTRASI) {
                $persyaratans = MasterPersyaratan::where('evaluasi_id', Evaluasi::ADMINISTRASI)
                    ->orWhere('evaluasi_id', Evaluasi::KUALIFIKASI)
                    ->where('is_deleted', 0)
                    ->get();
            } else {
                $persyaratans = MasterPersyaratan::where('evaluasi_id', $request->evaluasi)->where('is_deleted', 0)->get();
            }
        } else {
            $persyaratans = MasterPersyaratan::where('evaluasi_id', $request->evaluasi)->where('is_deleted', 0)->get();
        }

        $persyaratans = MasterPersyaratan::whereNull('parent_id')
            ->where('evaluasi_id', $request->evaluasi)
            ->where('is_deleted', 0)
            ->get();
        // DebugBar::info($persyaratans);

        $peksyr = PekerjaanPersyaratan::where('pekerjaan_persyaratan.evaluasi_id', $request->evaluasi)
            ->where('pekerjaan_persyaratan.pekerjaan_id', $id)
            // ->join('master_persyaratan', 'pekerjaan_persyaratan.master_persyaratan_id', '=', 'master_persyaratan.id')
            // ->select('master_persyaratan.jenis')
            ->select('pekerjaan_persyaratan.master_persyaratan_id')
            // ->distinct()
            ->get();
        // ->toArray();

        // dd($peksyr);
        $peksyarat = array();
        foreach ($peksyr as $key => $value) {
            $peksyarat[] = $value->master_persyaratan_id;
        }
        // $this->peksyarat = $peksyarat;
        DebugBar::info($peksyarat);
        //         $peksyarat = PekerjaanPersyaratanHelper::getByEvaluasiAndPekerjaanAndUser($request->evaluasi, $id, 20300);
        //         DebugBar::info($peksyarat);
        return view('persiapanPengadaan.konfigurasiPersyaratanPengadaan.konfigurasiPersyaratan', [
            'detail_pekerjaan' => Pekerjaan::find($id),
            'persyaratans' => $persyaratans,
            'evaluasi' => Evaluasi::find($request->evaluasi)->nama,
            'master_persyaratan_id' => $master_persyaratan_id,
            'peksyarat' => $peksyarat,
            // 'peksyr' => $peksyr,
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
            //dump($pekerjaan);

            // Creating Panitia automatically
            $pekerjaan_id = $pekerjaan->id;
            PekerjaanHelper::setPanitiaPekerjaan($pekerjaan_id);
            PekerjaanPanitiaHelper::createAksesPanitia($pekerjaan_id);
            //die();
            // // Linking RFQ-Pekerjaan
            $rfq->status = MaxRfq::PEKERJAAN;
            $rfq->max_id = $pekerjaan_id;
            $rfq->save();
            //dump($rfq);

            $idtampil = 0;
            foreach ($lines as $line) {
                $hargahps      = 0;
                $tgl_kebutuhan = date('Y-m-d');
                $tgl_req       = date('Y-m-d');
                $spesifikasi   = '';
                $spesifikasi2  = '';
                $noupb         = '';
                $nosdkal       = '';
                $noreq         = '';
                $nowo          = '';
                $wodesc        = '';
                $tipereq       = '';
                $kodebarang    = '';
                $idanggaran    = '';
                $idtampil++;
                $pekerjaan_rincian = new PekerjaanRincian();
                $pekerjaan_rincian->pekerjaan_id = $pekerjaan_id;
                $pekerjaan_rincian->nama = $line->line_desc;
                $pekerjaan_rincian->volume = $line->order_qty;
                $pekerjaan_rincian->satuan = $line->line_unit;
                $pekerjaan_rincian->tipe = 1;
                $pekerjaan_rincian->pajak = 0;
                $pekerjaan_rincian->harga_satuan = $hargahps;
                $pekerjaan_rincian->harga_satuan_oe = $hargahps;
                $pekerjaan_rincian->tglkebutuhan = $tgl_kebutuhan;
                $pekerjaan_rincian->spesifikasi = $spesifikasi;
                $pekerjaan_rincian->noupb = $noupb;
                $pekerjaan_rincian->nosdkal = $nosdkal;
                $pekerjaan_rincian->nohps = '';
                $pekerjaan_rincian->noreq = $noreq;
                $pekerjaan_rincian->nowo = $nowo;
                $pekerjaan_rincian->tglreq = $tgl_req;
                $pekerjaan_rincian->wodesc = $wodesc;
                $pekerjaan_rincian->stockcode =  $line->itemnum;
                $pekerjaan_rincian->kodebarang = $kodebarang;
                $pekerjaan_rincian->kodedistrik = $satuan_kerja_id;

                // $pekerjaan_rincian->kode_anggaran = $idanggaran;
                // $pekerjaan_rincian->peruntukan = $lokasi;
                // $pekerjaan_rincian->dsrusulan = $no_surat_perintah;

                $pekerjaan_rincian->idtampil = $idtampil;
                $pekerjaan_rincian->pr_id = json_decode($line->other_attr, true)['PR_ID'];
                $pekerjaan_rincian->save();
                //dump($pekerjaan_rincian);

                // $pekerjaan_rincian->subnohps = $subnohps;

                // link rfq-pekerjaan
                $line->max_id = $pekerjaan_rincian->id;
                $line->save();
                //dump($line);
            }


            //history pekerjaan
            $pekerjaan_id   = $pekerjaan->id;
            $pengadaan_id   = null;
            $kode_pekerjaan = $pekerjaan->kode;
            $nama_pekerjaan = $pekerjaan->nama;
            $kode_tahap     = History::BUAT_PAKET;
            $status         = Pekerjaan::STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN;
            $deskripsi      = 'Buat Paket Kode : ' . $pekerjaan->kode . '<br/>Nama : ' . $pekerjaan->nama;
            $description    = 'Work Package Code : ' . $pekerjaan->kode . ' Name : ' . $pekerjaan->nama;

            eprocLoggerHelper::HistoryHeaderlog($pekerjaan_id, $kode_pekerjaan, $nama_pekerjaan, $status, $pengadaan_id);
            //eprocLoggerHelper::Historylog($pekerjaan_id, $pengadaan_id, $deskripsi, $status, $kode_tahap);
            $history_id = eprocLoggerHelper::getHistorylogId($pekerjaan_id, $deskripsi, $status, $kode_tahap, $pengadaan_id);
            eprocLoggerHelper::PekerjaanLog($kode_tahap, 'Work Package Created', $description, 0, $history_id, $pekerjaan_id);

            //die();
            DB::commit();
            return redirect()->route('persiapan-pengadaan.index')->with('success', 'Pengadaan berhasil dibuat');
        } catch (\Exception $e) {
            throw $e;
            DebugBar::info($e);
            DB::rollBack();
            return redirect()->route('persiapan-pengadaan.index')->with('error', 'Pengadaan gagal dibuat');
        }
    }
}
