<?php

namespace App\Http\Controllers;

use PekerjaanHelper;
use App\Models\Bidang;
use App\Models\History;
use App\Models\Evaluasi;
use App\Models\Pekerjaan;
use App\Models\SubBidang;
use App\Models\MCommodity;
use App\Models\Klasifikasi;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use App\Models\MSubCommodity;
use App\Models\MetodePengadaan;
use App\Models\MasterPersyaratan;
use App\Models\PekerjaanSubBidang;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\PekerjaanPersyaratan;
use App\Models\PekerjaanSubCommodity;
use App\Models\KualifikasiGroupDetail;
use Barryvdh\Debugbar\Facades\Debugbar;
use EprocLoggerHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingPersiapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settingPersiapanPengadaan.index', [
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
            'bidang_materials' => Bidang::select('id', 'kode', 'nama')
                ->where('is_deleted', 0)
                ->orderBy('nama', 'asc')
                ->get(),
            'sub_bidang_materials' => SubBidang::select('id', 'kode', 'nama')
                ->where('is_deleted', 0)
                ->orderBy('nama', 'asc')
                ->get(),
            'metode_pengadaans' => MetodePengadaan::select('id', 'kode', 'nama')
                ->orderBy('nama', 'asc')
                ->get(),
            'group_materials' => MCommodity::select('id', 'kode', 'nama')
                ->where('state', 1)
                ->orderBy('nama', 'asc')
                ->get(),
            'materials' => MSubCommodity::select('id', 'kode', 'nama')
                ->orderBy('nama', 'asc')
                ->get(),
        ]);
    }
    public function getBidang(Request $request)
    {
        $klasifikasiId = $request->input('klasifikasi_id');


        $bidangs = Bidang::where('klasifikasi_id', $klasifikasiId)->pluck('nama', 'id');
        DebugBar::info($bidangs);

        // Kirimkan data sub bidang dalam format JSON
        return response()->json($bidangs);
    }
    public function getSubBidang(Request $request)
    {
        DebugBar::info('masuk');
        // Ambil id bidang material yang dipilih dari request
        $bidangId = $request->input('bidang_id');

        // Query untuk mendapatkan sub bidang berdasarkan bidang material yang dipilih
        $subBidangMaterials = SubBidang::where('bidang_id', $bidangId)->pluck('nama', 'id');
        $kualifikasi = KualifikasiGroupDetail::where('group_id', Bidang::find($bidangId)->group_id)
            ->select('id', 'nama', 'pekerjaan_batas_bawah', 'pekerjaan_batas_atas')
            ->get();
        $data = [
            'sub_bidang' => $subBidangMaterials,
            'kualifikasi' => $kualifikasi
        ];
        // Kirimkan data sub bidang dalam format JSON
        return response()->json($data);
    }
    public function getMSubCommodity(Request $request)
    {
        $mCommodityId = $request->input('mCommodityId');
        $mSubCommodities = MSubCommodity::where('commodity_id', $mCommodityId)->pluck('nama', 'id');
        DebugBar::info($mSubCommodities);

        // Kirimkan data sub bidang dalam format JSON
        return response()->json($mSubCommodities);
    }

    public function updateSettingPersiapanPengadaan(Request $request)
    {
        //($request->all());
        //     if (!$this->getRequestParameter('id')) {
        //         $this->pekerjaan = new Pekerjaan();
        //         $kode = $this->getRequestParameter('kode');
        //         if (!$kode) {
        //             $this->getRequest()->setError('kode', 'Kode Pekerjaan tidak boleh kosong!');
        //             return false;
        //         }
        //         $c = new Criteria;
        //         $c->add(PekerjaanPeer::KODE, $kode);
        //         $n = PekerjaanPeer::doCount($c);
        //         if ($n) {
        //             $this->getRequest()->setError('kode', 'Kode Pekerjaan sudah pernah ada!');
        //             return false;
        //         }
        //     } else {
        //         $this->pekerjaan = PekerjaanPeer::retrieveByPk($this->getRequestParameter('id'));
        //         $this->forward404Unless($this->pekerjaan);
        //     }

        //     // if (!$request->input('done')) {
        //     //     return true;
        //     // }

        //     if (!$request->input('id')) {
        //         $validator = Validator::make($request->all(), [
        //             'kode' => 'required|unique:pekerjaan,kode',
        //             // Definisikan aturan validasi lainnya di sini
        //         ]);

        //         if ($validator->fails()) {
        //             return redirect()->route('persiapan-pengadaan.index')
        //                 ->withErrors($validator)
        //                 ->withInput();
        //         }
        //     } else {
        //         $pekerjaan = Pekerjaan::find($request->input('id'));
        //         if (!$pekerjaan) {
        //             abort(404); // Forward404Unless diubah menjadi abort(404) dalam Laravel
        //         }
        //     }
        // }

        $rules = [
            'id' => 'required|numeric',
            'no_perkiraan' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'currency_id' => 'sometimes|string',
            'tahun' => 'required|numeric',
            'klasifikasi' => 'sometimes|numeric',
            'metode_pengadaan' => 'sometimes|numeric',
            'metode_kontrak' => 'sometimes|string',
            'requester' => 'sometimes|string',
            'status_multi_pemenang' => 'sometimes|in:on,off',
        ];

        $messages = [
            'id.required' => 'ID tidak boleh kosong.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'tahun.required' => 'Tahun tidak boleh kosong.',
            // Tambahkan pesan kustom untuk aturan validasi lainnya
        ];

        // Validasi menggunakan Validator dengan aturan dan pesan kustom
        $validator = Validator::make($request->all(), $rules, $messages);

        // if ($this->getContext()->getUser()->isPanitia()) {
        // 	if ($this->getRequestParameter('hps') > $this->pekerjaan->getAnggaran()) {
        // 		$request->setError('', 'Nilai HPS tidak boleh melebihi Anggaran');
        // 		$masih_ada_error = true;
        // 	}
        // 	if ($this->hasRequestParameter('bobot_teknis')) {
        // 		if ($this->getRequestParameter('bobot_teknis') == null && ($this->getRequestParameter('bobot_teknis') < 60 || $this->getRequestParameter('bobot_teknis') > 80)) {
        // 			$request->setError('', 'Bobot teknis harus bernilai antara 60 sampai 80');
        // 			$masih_ada_error = true;
        // 		}
        // 	}
        // 	if ($this->hasRequestParameter('bobot_harga')) {
        // 		if ($this->getRequestParameter('bobot_harga') == null && ($this->getRequestParameter('bobot_harga') < 60 || $this->getRequestParameter('bobot_harga') > 80)) {
        // 			$request->setError('', 'Bobot harga harus bernilai antara 60 sampai 80');
        // 			$masih_ada_error = true;
        // 		}
        // 	}
        // }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $pekerjaan = $request->input('id') ? Pekerjaan::findOrFail($request->input('id')) : new Pekerjaan();
        } catch (ModelNotFoundException $e) {
            // Tangani kasus di mana Pekerjaan tidak ditemukan
            return response()->json(['error' => 'Pekerjaan tidak ditemukan'], 404);
        }

        try {
            DB::beginTransaction();

            if (true) {
                $pekerjaan->nama = $request->input('nama');
                $pekerjaan->ppn = $request->input('ppn');
                $pekerjaan->status_umum = $request->input('status_umum', 0); //kosong
                $pekerjaan->status_elektronik = $request->input('status_elektronik', 0); //kosong
                $pekerjaan->no_surat_perintah = $request->input('no_surat_perintah'); //kosong
                $pekerjaan->sumber_dana = $request->input('sumber_dana'); //kosong
                $pekerjaan->tahun = $request->input('tahun', date("Y"));
                $pekerjaan->lokasi = $request->input('lokasi'); //kosong
                $pekerjaan->currency_id = $request->input('currency_id');

                $pekerjaan->status_selesai = $request->input('status_selesai', 0);

                $klasifikasi_id =  $request->input('klasifikasi') ? $request->input('klasifikasi') : null;
                $klasifikasi_jenis = 0; //default jenis barang
                if ($klasifikasi_id) {
                    $klasifikasi = Klasifikasi::find($klasifikasi_id);
                    if ($klasifikasi) {
                        $klasifikasi_jenis = $klasifikasi->jenis;
                    }
                }

                $pekerjaan->klasifikasi_id = $request->input('klasifikasi') ? $request->input('klasifikasi') : null;
                $pekerjaan->requester = $request->input('requester');

                //get pekerjaan kualifikasi from pekerjaan_sub_bidang
                $pekerjaan_sub_bidang = PekerjaanSubBidang::where('pekerjaan_id', $pekerjaan->id)->first();

                if ($pekerjaan_sub_bidang) {
                    $pekerjaan->kualifikasi_id = $pekerjaan_sub_bidang->kualifikasi_id;
                    $pekerjaan->bidang_id = $pekerjaan_sub_bidang->sub_bidang->bidang_id;
                } else {
                    $pekerjaan->kualifikasi_id = null;
                    $pekerjaan->bidang_id = null;
                }

                //get pekerjaan commodity from pekerjaan_sub_commodity
                $pekerjaan_sub_commodity = PekerjaanSubCommodity::where('pekerjaan_id', $pekerjaan->id)->first();

                if ($pekerjaan_sub_commodity) {
                    $pekerjaan->commodity_id = $pekerjaan_sub_commodity->sub_commodity->commodity_id;
                } else {
                    $pekerjaan->commodity_id = null;
                }

                $pekerjaan->bobot_teknis = $request->input('bobot_teknis') ? $request->input('bobot_teknis') : null;
                $pekerjaan->bobot_harga = $request->input('bobot_harga') ? $request->input('bobot_harga') : null;
                $pekerjaan->batas_lulus = $request->input('batas_lulus') ? $request->input('batas_lulus') : null;
                $metode_pengadaan = $pekerjaan->metode_pengadaan_id;
                // PJB
                // $pekerjaan->setMetodePengadaanId(MetodePengadaanPeer::getIdByMetodeIDs($this->getRequestParameter('metode_penilaian_kualifikasi_id'), $this->getRequestParameter('metode_evaluasi_penawaran_id'), $this->getRequestParameter('metode_penyampaian_dokumen_id'), $this->getUser()->getInstansiId(), new Criteria()));
                $pekerjaan->metode_pengadaan_id = $request->input('metode_pengadaan') ? $request->input('metode_pengadaan') : null;
                $metode_pengadaan = MetodePengadaan::find($request->input('metode_pengadaan'));

                //STATUS AUCTION
                if ($metode_pengadaan) {
                    if ($metode_pengadaan->sistem_pengadaan_id == 'ETENDERING') {
                        $pekerjaan->status_auction = $request->input('status_auction') ?? 0;
                    } else {
                        $pekerjaan->status_auction = 0;
                    }
                }

                $pekerjaan->hps_tampil = $request->input('hps_tampil');
                $pekerjaan->status_multi_pemenang = $request->input('status_multi_pemenang') ? 1 : 0;
                $pekerjaan->metode_kontrak = $request->input('metode_kontrak') ? $request->input('metode_kontrak') : null;

                if (true) {
                    $pekerjaan_persyaratans = $pekerjaan->pekerjaanPersyaratan;
                    foreach ($pekerjaan_persyaratans as $pekerjaan_persyaratan) {
                        // hanya hapus yg dari master persyaratan
                        if ($pekerjaan_persyaratan->master_persyaratan_id) {
                            $pekerjaan_persyaratan->delete();
                        }

                        if ($pekerjaan_persyaratan->ref_id) {
                            $pekerjaan_persyaratan->delete();
                        }
                    }
                    // ambil persyaratan
                    $pekerjaan_menggunakan_nilai_teknis = false;

                    $query = MasterPersyaratan::query();

                    $query->where(function ($query) use ($pekerjaan) {
                        $query->where('evaluasi_id', Evaluasi::KEWAJARAN_HARGA);

                        if (config('app.persyaratan.persyaratan_administrasi') == 1) {
                            $query->orWhere('evaluasi_id', Evaluasi::KUALIFIKASI)
                                ->orWhere('evaluasi_id', Evaluasi::ADMINISTRASI)
                                ->orWhere('evaluasi_id', Evaluasi::KEWAJARAN_HARGA);
                        }

                        if (!$pekerjaan->status_multi_pemenang) {
                            if ($pekerjaan->metodePengadaan && $pekerjaan->metodePengadaan->metodeEvaluasiPenawaran->status_butuh_bobot_teknis) {
                                $query->orWhere('evaluasi_id', Evaluasi::NILAI_TEKNIS);
                                $pekerjaan_menggunakan_nilai_teknis = true;
                            } else {
                                $query->orWhere('evaluasi_id', Evaluasi::TEKNIS);
                            }
                        } else {
                            if (config('app.multi_pemenang.bobot') == 0) {
                                if ($pekerjaan->metodePengadaan && $pekerjaan->metodePengadaan->metodeEvaluasiPenawaran->status_butuh_bobot_teknis) {
                                    $query->orWhere('evaluasi_id', Evaluasi::NILAI_TEKNIS);
                                    $pekerjaan_menggunakan_nilai_teknis = true;
                                } else {
                                    $query->orWhere('evaluasi_id', Evaluasi::TEKNIS);
                                }
                            }
                        }
                    });
                    $query
                        ->leftJoin('master_persyaratan_klasifikasi', 'master_persyaratan.id', '=', 'master_persyaratan_klasifikasi.master_persyaratan_id')
                        ->where('master_persyaratan_klasifikasi.klasifikasi_id', $klasifikasi_id)
                        ->where('is_deleted', 0)
                        ->orderBy('master_persyaratan.ref_id', 'asc');

                    $master_persyaratans = $query->get();

                    //dump($master_persyaratans);

                    $i = 0;
                    $pekerjaan_persyaratan = array();
                    foreach ($master_persyaratans as $master_persyaratan) {
                        $pekerjaan_persyaratan = new PekerjaanPersyaratan();
                        $pekerjaan_persyaratan->pekerjaan_id = $pekerjaan->id;
                        $pekerjaan_persyaratan->tipe = $master_persyaratan->tipe;
                        $pekerjaan_persyaratan->deskripsi = $master_persyaratan->deskripsi;
                        $pekerjaan_persyaratan->jenis = $master_persyaratan->jenis;

                        if ($pekerjaan->metodePengadaan && $pekerjaan->metodePengadaan->sistem_pengadaan_id == MetodePengadaan::PENUNJUKAN_LANGSUNG) {
                            if ($master_persyaratan->evaluasi_id == Evaluasi::KUALIFIKASI) {
                                $pekerjaan_persyaratan->evaluasi_id = Evaluasi::ADMINISTRASI;
                            } else {
                                $pekerjaan_persyaratan->evaluasi_id = $master_persyaratan->evaluasi_id;
                            }
                        } else {
                            $pekerjaan_persyaratan->evaluasi_id = $master_persyaratan->evaluasi_id;
                        }

                        $pekerjaan_persyaratan->master_persyaratan_id = $master_persyaratan->id;
                        if ($pekerjaan_menggunakan_nilai_teknis) {
                            $pekerjaan_persyaratan->batas_lulus = $master_persyaratan->batas_lulus;
                        }
                        //dump($pekerjaan_persyaratan->toArray());
                        $pekerjaan_persyaratan->save();
                        //dump($pekerjaan_persyaratan->toArray());
                    }
                    //die();
                    //update 18-01-2017 utk multipemenang, ambil dari pekerjaan rincian
                    if ($pekerjaan->status_multi_pemenang) {
                        if (config('app.multi_pemenang.bobot') == 0) {
                            $pekerjaan_rincians = $pekerjaan->pekerjaanRincian;
                            foreach ($pekerjaan_rincians as $pekerjaan_rincian) {
                                $pekerjaan_persyaratan = new PekerjaanPersyaratan();
                                $pekerjaan_persyaratan->pekerjaan_id = $pekerjaan->id;
                                $pekerjaan_persyaratan->deskripsi = $pekerjaan_rincian->nama;
                                $pekerjaan_persyaratan->ref_id = $pekerjaan_rincian->id;
                                $pekerjaan_persyaratan->jenis = MasterPersyaratan::TIPE_PERSYARATAN_FORMAL;

                                if ($pekerjaan_menggunakan_nilai_teknis) {
                                    $pekerjaan_persyaratan->batas_lulus = 0;
                                    $pekerjaan_persyaratan->tipe = PekerjaanPersyaratan::TIPE_NILAI;
                                    $pekerjaan_persyaratan->evaluasi_id = Evaluasi::NILAI_TEKNIS;
                                } else {
                                    $pekerjaan_persyaratan->tipe = PekerjaanPersyaratan::TIPE_PILIHAN_BENAR_SALAH;
                                    $pekerjaan_persyaratan->evaluasi_id = Evaluasi::TEKNIS;
                                }
                                //dump($pekerjaan_persyaratan->toArray());
                                $pekerjaan_persyaratan->save();
                            }
                        }
                    }
                    //dump($pekerjaan);
                    //die();
                    $pekerjaan->save();

                    //history pekerjaan
                    $pekerjaan_id    = $request->input('id');
                    $bidang_id    = $pekerjaan->bidang_id;
                    $commodity_id    = $pekerjaan->commodity_id;

                    $metode_id    = $request->input('metode_pengadaan');
                    $klasifikasi_Id    = $pekerjaan->klasifikasi_id;
                    $kualifikasi_Id    = $pekerjaan->kualifikasi_id;
                    $metode_kontrak    = $pekerjaan->metode_kontrak;

                    //$pekerjaan		= PekerjaanPeer::retrieveByPk($pekerjaan_id);
                    $kualifikasi    = Kualifikasi::find($kualifikasi_Id);
                    $str_metode_kontrak = PekerjaanHelper::getMetodeKontrakString($metode_kontrak);
                    // $pekerjaan_klasifikasi = !empty($pekerjaan->klasifikasi) ? dump($pekerjaan_klasifikasi) : dump('$pekerjaan_klasifikasi 0');
                    // $pekerjaan_bidang = !empty($pekerjaan->bidang) ? dump($pekerjaan->bidang) : dump('$pekerjaan_bidang 1');
                    // $pekerjaan_kualifikasi = $kualifikasi ? dump($pekerjaan_kualifikasi) : dump('$pekerjaan_kualifikasi 0');
                    // $pekerjaan_metode = !empty($pekerjaan->metodePengadaan) ? dump($pekerjaan_metode) : dump('$pekerjaan_metode 0');

                    $pekerjaan_klasifikasi = !empty($pekerjaan->klasifikasi) ? $pekerjaan->klasifikasi->nama : '';
                    $pekerjaan_bidang = $pekerjaan->bidang->isNotEmpty() ? $pekerjaan->bidang->nama : '';
                    $pekerjaan_kualifikasi = !empty($kualifikasi) ? $kualifikasi->nama : '';
                    $pekerjaan_metode = !empty($pekerjaan->metodePengadaan) ? $pekerjaan->metodePengadaan->nama : '';

                    $sub_bidangs = PekerjaanSubBidang::where('pekerjaan_id', $pekerjaan->id)->get();
                    $data_sub_bidang = array();
                    foreach ($sub_bidangs as $sub_bidang) :
                        $data_sub_bidang[] = $sub_bidang->subBidang->nama;
                    endforeach;

                    $sub_commoditys = PekerjaanSubCommodity::where('pekerjaan_id', $pekerjaan->id)->get();
                    $data_sub_commodity = array();
                    foreach ($sub_commoditys as $sub_commodity) :
                        $data_sub_commodity[] = $sub_commodity->mSubCommodity->nama;
                    endforeach;

                    $deskripsi = 'Setting pekerjaan : (' . $pekerjaan->kode . ') ' . $pekerjaan->nama . ' <br/> <ul><li>Klasifikasi : ' . $pekerjaan_klasifikasi . '</li><li>Bidang : ' . $pekerjaan_bidang . '</li><li>Sub Bidang : ' . json_encode($data_sub_bidang) . '</li><li>Kualifikasi : ' . $pekerjaan_kualifikasi . '</li><li>Metode : ' . $pekerjaan_metode . '</li><li>Jenis Kontrak : ' . $str_metode_kontrak . '</li></ul>';
                    $description = 'Work Package Setting : (' . $pekerjaan->kode . ') ' . $pekerjaan->nama . ' <br/> <ul><li>Classification : ' . $pekerjaan_klasifikasi . '</li><li>Field : ' . $pekerjaan_bidang . '</li><li>Sub Field : ' . json_encode($data_sub_bidang) . '</li><li>Qualification : ' . $pekerjaan_kualifikasi . '</li><li>Methods : ' . $pekerjaan_metode . '</li><li>Contract Type : ' . $str_metode_kontrak . '</li></ul>';
                    $status_pekerjaan = History::getStatusHistoryPekerjaan($pekerjaan->status);
                    $kode_tahap = History::SETTING_PEKERJAAN;
                    $history_id = eprocLoggerHelper::getHistorylogId($pekerjaan_id, $deskripsi, $status_pekerjaan, $kode_tahap);
                    eprocLoggerHelper::PekerjaanLog($kode_tahap, 'Work Package Setting', $deskripsi, 0, $history_id, $pekerjaan_id);
                    eprocLoggerHelper::log('Set pekerjaan:' . $pekerjaan->nama);
                }
            }
            DB::commit();

            return redirect()->route('persiapan-pengadaan.show', ['id' => $pekerjaan->id])->with('success', 'Pengadaan berhasil diedit');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->route('persiapan-pengadaan.show', ['id' => $pekerjaan->id])->with('error', 'Pengadaan gagal diedit');
        }
    }

    public function storeSubBidang(Request $request)
    {
        Debugbar::info($request->all());
        try {
            DB::beginTransaction();
            $requestData = $request->all();
            $bidang_id = $requestData['bidangId'];
            $sub_bidang_id = $requestData['subBidangId'];
            $kualifikasi_id = $requestData['kualifikasiId'];
            $pekerjaan_id = $requestData['pekerjaanId'];

            $sub_bidang = SubBidang::find($sub_bidang_id);
            //langsung simpan ke pekerjaan_sub_bidang
            $pekerjaan_sub_bidang = PekerjaanSubBidang::where('pekerjaan_id', $pekerjaan_id)
                ->where('sub_bidang_id', $sub_bidang_id)
                ->first();

            if (!$pekerjaan_sub_bidang) {
                $pekerjaan_sub_bidang = new PekerjaanSubBidang();
                $pekerjaan_sub_bidang->pekerjaan_id = $pekerjaan_id;
                $pekerjaan_sub_bidang->sub_bidang_id = $sub_bidang_id;

                $kualifikasi_group_detail = KualifikasiGroupDetail::find($kualifikasi_id);

                if ($kualifikasi_group_detail) {
                    $pekerjaan_sub_bidang->kualifikasi_group_detail_id = $kualifikasi_group_detail->id;
                    $pekerjaan_sub_bidang->kualifikasi_id = $kualifikasi_group_detail->kualifikasi_id;
                }

                DebugBar::info($pekerjaan_sub_bidang);
                $pekerjaan_sub_bidang->save();

                $status_save = false;

                $pekerjaan = Pekerjaan::find($pekerjaan_id);
                if ($pekerjaan->bidang_id == null) {
                    $pekerjaan->bidang_id = $sub_bidang->id;
                    $status_save = true;
                }
                if ($pekerjaan->kualifikasi_id == null) {
                    $pekerjaan->kualifikasi_id = $kualifikasi_id;
                    $status_save = true;
                }
                if ($status_save) $pekerjaan->save();

                DB::commit();
            }
            $pekerjaan_sub_bidangs = PekerjaanSubBidang::where('pekerjaan_id', $pekerjaan_id)->get();
            $data = [];
            foreach ($pekerjaan_sub_bidangs as $pekerjaan_sub_bidang) {
                $dataItem = [];

                $dataItem['kodeBidang'] = $pekerjaan_sub_bidang->subBidang->bidang->kode;
                $dataItem['namaBidang'] = $pekerjaan_sub_bidang->subBidang->bidang->kode;
                $dataItem['kodeSubBidang'] = $pekerjaan_sub_bidang->subBidang->kode;
                $dataItem['namaSubBidang'] = $pekerjaan_sub_bidang->subBidang->nama;
                $dataItem['kualifikasi'] = $pekerjaan_sub_bidang->kualifikasiGroupDetail->nama ?? '-';

                $data[] = $dataItem;
            }
            Debugbar::info($data);
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function storeSubCommodity(Request $request)
    {
        try {
            DB::beginTransaction();
            Debugbar::info($request->all());
            $requestData = $request->all();
            $subCommodityId = $requestData['subCommodityId'];
            $mCommodity = $requestData['mCommodity'];
            $pekerjaan_id = $requestData['pekerjaanId'];

            $sub_commodity = MSubCommodity::find($subCommodityId);

            $pekerjaan_sub_commodity = PekerjaanSubCommodity::where('pekerjaan_id', $pekerjaan_id)->where('sub_commodity_id',  $subCommodityId)->first();

            if (!$pekerjaan_sub_commodity) {
                $pekerjaan_sub_commodity = new PekerjaanSubCommodity();
                $pekerjaan_sub_commodity->pekerjaan_id = $pekerjaan_id;
                $pekerjaan_sub_commodity->sub_commodity_id = $subCommodityId;
                DebugBar::info('pekerjaan_sub_commodity', $pekerjaan_sub_commodity);
                $pekerjaan_sub_commodity->save();

                $status_save = false;
                $pekerjaan = Pekerjaan::find($pekerjaan_id);
                if ($pekerjaan->commodity_id == null) {
                    $pekerjaan->commodity_id = $sub_commodity->commodity_id;
                    $status_save = true;
                }
                DebugBar::info('pekerjaan', $pekerjaan);
                if ($status_save) $pekerjaan->save();
            }
            DB::commit();

            $pekerjaan_sub_commodities = PekerjaanSubCommodity::where('pekerjaan_id', $pekerjaan_id)->get();
            $data = [];
            foreach ($pekerjaan_sub_commodities as $pekerjaan_sub_commodity) {
                $dataItem = [];

                $dataItem['kodeMSubCommodity'] = $pekerjaan_sub_commodity->mSubCommodity->kode;
                $dataItem['namaMSubCommodity'] =  $pekerjaan_sub_commodity->mSubCommodity->nama;
                $dataItem['kodeMCommodity'] = $pekerjaan_sub_commodity->mSubCommodity->mCommodity->kode;
                $dataItem['namaMCommodity'] = $pekerjaan_sub_commodity->mSubCommodity->mCommodity->nama;

                $data[] = $dataItem;
            }
            //Debugbar::info('data', $data);
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteSubBidang(Request $request, $id)
    {
        DebugBar::info($id);

        $pekerjaan_id = PekerjaanSubBidang::find($id)->pekerjaan_id;

        $pekerjaan_sub_bidang = PekerjaanSubBidang::find($id);

        if ($pekerjaan_sub_bidang) {
            $pekerjaan_sub_bidang->delete();
        } else {
            $pekerjaan = Pekerjaan::find($pekerjaan_id);
            $pekerjaan->bidang_id = null;
            $pekerjaan->kualifikasi_id = null;
            $pekerjaan->save();
        }
        return redirect()
            ->back()
            ->with('success', 'Your message has been sent successfully!');
    }

    public function deleteSubCommodity(Request $request, $id)
    {
        $pekerjaan_id = PekerjaanSubCommodity::find($id)->pekerjaan_id;

        $pekerjaan_sub_commodity = PekerjaanSubCommodity::find($id);
        if ($pekerjaan_sub_commodity) {
            $pekerjaan_sub_commodity->delete();
        } else {
            $pekerjaan = Pekerjaan::find($pekerjaan_id);
            $pekerjaan->commodity_id = null;
            $pekerjaan->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Your message has been sent successfully!');
    }
}
