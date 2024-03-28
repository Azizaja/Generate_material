<?php

use App\Models\ApplicationUser;
use App\Models\PekerjaanPanitia;

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
}
