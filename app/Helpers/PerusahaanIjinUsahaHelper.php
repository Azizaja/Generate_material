<?php

use App\Models\Dokumentasi;

class PerusahaanIjinUsahaHelper
{
    public static function getTipeNonExpire()
    {
        return array(
            Dokumentasi::JENIS_PERUSAHAAN_NPWP,
            Dokumentasi::JENIS_PERUSAHAAN_SPPKP,
            Dokumentasi::JENIS_PERUSAHAAN_PAKTA,
            Dokumentasi::JENIS_PERUSAHAAN_NIB,
            Dokumentasi::JENIS_PERUSAHAAN_DOMISILI,
            Dokumentasi::JENIS_PERUSAHAAN_STRUKTUR,
            Dokumentasi::JENIS_PERUSAHAAN_PROFIL,
        );
    }
}
