<?php

use App\Models\ApplicationUser;
use App\Models\MasterPersyaratan;
use Illuminate\Support\Facades\DB;

class PekerjaanPersyaratanHelper
{
    const TIPE_PILIHAN_BENAR_SALAH = 1;
    const TIPE_NILAI = 2;

    public static function getJenisDokumen($noJenis)
    {
        $jenis = MasterPersyaratan::getTipePersyaratan();
        return $jenis[$noJenis];
    }

    public static function  getByEvaluasiAndPekerjaanAndUser($evaluasi_id, $pekerjaan_id, $user_id, $c = null)
    {
        $user = ApplicationUser::find(20300);
        $query = DB::table('pekerjaan_persyaratan')
            ->join('pekerjaan', 'pekerjaan.id', '=', 'pekerjaan_persyaratan.pekerjaan_id')
            ->join('pekerjaan_panitia', 'pekerjaan.id', '=', 'pekerjaan_panitia.pekerjaan_id')
            ->where('pekerjaan_persyaratan.evaluasi_id', $evaluasi_id)
            ->where('pekerjaan_persyaratan.pekerjaan_id', $pekerjaan_id)
            ->where('pekerjaan_panitia.user_id', $user_id);

        
        if ($user) {
            $query->where('pekerjaan_panitia.user_id', $user_id);
        }

        return $query->get();
    }
}
