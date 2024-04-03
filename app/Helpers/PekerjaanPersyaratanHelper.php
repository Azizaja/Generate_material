<?php

use App\Models\MasterPersyaratan;

class PekerjaanPersyaratanHelper
{
    public static function getJenisDokumen($noJenis)
    {
        $jenis = MasterPersyaratan::getTipePersyaratan();
        return $jenis[$noJenis];
    }
}
