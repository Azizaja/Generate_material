<?php

use DebugBar\DebugBar;
use App\Models\Pekerjaan;
use App\Models\ApplicationUser;
use App\Models\KelompokPanitia;
use App\Models\PekerjaanPanitia;
use Illuminate\Support\Facades\DB;
use App\Models\PekerjaanPanitiaAkses;

class PekerjaanPanitiaHelper
{
    const JABATAN = array(
        0 => array(
            'PEMIMPIN_CABANG'        => 'Pemimpin Cabang',
            'WAKIL_PEMIMPIN'        => 'Wakil Pemimpin Cabang',
            'PENYELIA_UMUM'            => 'Penyelia Umum Akuntansi',
            'ASISTEN'            => 'Asisten',
        ),
        1 => array(
            'DIREKTUR_UTAMA'    => 'Direktur Utama',
            'DIREKTUR'            => 'Direktur',
            'GM'                => 'General Manager',
            'SENIOR_MANAGER'    => 'Senior Manager',
            'MANAGER'            => 'Manager',
            'PURCHASER'            => 'Purchaser',
            'ADMIN_PURCHASER'    => 'Admin Purchaser',
            'RENDAL'            => 'Rendal'
        )
    );

    public static function getJabatanString($id)
    {
        if ($id == 1) {
            return 'Ketua';
        }
        return 'Anggota';
    }

    public static function getKeteranganString($id)
    {
        $pekerjaanPanitia = PekerjaanPanitia::find($id);

        $keterangan = $pekerjaanPanitia->applicationUser->mPosition->first()->satuanKerja->state;
        $position = $pekerjaanPanitia->applicationUser->mPosition->first()->position;
        return self::JABATAN[$keterangan][$position];
    }

    public static function getPanitia($instansiId, $satuanKejaId = NULL)
    {
        $users = ApplicationUser::where('tipe_user_id', 5)->get();

        return $users;
    }
    public static function createAksesPanitia($pekerjaan_id)
    {
        $pekerjaan = Pekerjaan::find($pekerjaan_id);
        if (!$pekerjaan->getAdaAksesPanitia($pekerjaan_id)) {
            $pekerjaan_panitia = PekerjaanPanitia::where('pekerjaan_id', $pekerjaan_id)->first();
            if (!$pekerjaan_panitia) {
                PekerjaanHelper::setPanitiaPekerjaan($pekerjaan_id);
            }
            $kelompok_panitia = KelompokPanitia::where('kode', $pekerjaan_id)->first();
            $pekerjaan_panitias = $pekerjaan->getPekerjaanPanitiaByKelompokPanitia($kelompok_panitia);
            $array_panitia_akses = PekerjaanPanitiaAksesHelper::getArrayAkses();
            $array_panitia_approve = PekerjaanPanitiaAksesHelper::getArrayApprove();

            // default di isi semua akses
            try {
                DB::beginTransaction();
                $pekerjaan->deleteAllPekerjaanPanitiaAkses();

                $default = array(
                    PekerjaanPanitiaAkses::AKSES_APPROVAL_LAKSANAKAN_LELANG => array(
                        'type'        => 'and',
                        'jabatan'    => array(PekerjaanPanitia::JABATAN_PPK, PekerjaanPanitia::JABATAN_KETUA),
                    ),
                    PekerjaanPanitiaAkses::AKSES_PENETAPAN_PEMENANG => array(
                        'type'        => 'and',
                        'jabatan'    => array(PekerjaanPanitia::JABATAN_PPK, PekerjaanPanitia::JABATAN_KETUA),
                    ),
                    PekerjaanPanitiaAkses::AKSES_PENUNJUKAN_PEMENANGAN => array(
                        'type'        => 'and',
                        'jabatan'    => array(PekerjaanPanitia::JABATAN_PPK, PekerjaanPanitia::JABATAN_KETUA),
                    )
                );

                // dump($pekerjaan_panitias->pluck('user_id'));
                // foreach ($array_panitia_akses as $key => $akses) {
                //     foreach ($pekerjaan_panitias as $panitia) {
                //         $check = MPositionCredentialHelper::getInAkses($key, $panitia->applicationUser->getUserKodeJabatan());
                //         $check_read = MPositionCredentialHelper::getInAksesReadonly($key, $panitia->applicationUser->getUserKodeJabatan());
                //         $check = MPositionCredentialHelper::getInApprove($key, $panitia->applicationUser->getUserKodeJabatan());
                //     }
                // }
                // die();
                foreach ($array_panitia_akses as $key => $akses) {
                    foreach ($pekerjaan_panitias as $panitia) {
                        $check = MPositionCredentialHelper::getInAkses($key, $panitia->applicationUser->getUserKodeJabatan());
                        if ($check) {
                            $pekerjaan_panitia_akses = new PekerjaanPanitiaAkses();
                            $pekerjaan_panitia_akses->pekerjaan_panitia_id = $panitia->id;
                            $pekerjaan_panitia_akses->akses = $key;
                            $pekerjaan_panitia_akses->state = 0;

                            $check_read = MPositionCredentialHelper::getInAksesReadonly($key, $panitia->applicationUser->getUserKodeJabatan());

                            if ($check_read) {
                                $pekerjaan_panitia_akses->read_only = 1;
                            }

                            $pekerjaan_panitia_akses->created_at = date("Y-m-d H:i:s");
                            $pekerjaan_panitia_akses->created_by = ApplicationUser::find(20300)->id;
                            $pekerjaan_panitia_akses->save();
                        }
                        $check = MPositionCredentialHelper::getInApprove($key, $panitia->applicationUser->getUserKodeJabatan());
                        if ($check) {
                            $pekerjaan_panitia_akses = new PekerjaanPanitiaAkses();
                            $pekerjaan_panitia_akses->pekerjaan_panitia_id = $panitia->id;
                            $pekerjaan_panitia_akses->akses = $key;
                            $pekerjaan_panitia_akses->state = 0;
                            $pekerjaan_panitia_akses->created_at = date("Y-m-d H:i:s");
                            $pekerjaan_panitia_akses->created_by = ApplicationUser::find(20300)->id;
                            $pekerjaan_panitia_akses->sequence = 1;
                            $pekerjaan_panitia_akses->save();
                        }
                    }
                }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }
}
