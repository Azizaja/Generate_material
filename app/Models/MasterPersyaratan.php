<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPersyaratan extends Model
{
    use HasFactory;

    const TIPE_NILAI_TEKNIS         = 2;
    const TIPE_PERSYARATAN_ALL        = 0;
    const TIPE_PERSYARATAN_DOKUMEN    = 1;
    const TIPE_PERSYARATAN_FORMAL        = 2;

    public static function getTipePersyaratan()
    {
        return array(
            self::TIPE_PERSYARATAN_ALL         =>     'PEMBUKAAN DAN EVALUASI',
            self::TIPE_PERSYARATAN_DOKUMEN     => 'PEMBUKAAN',
            self::TIPE_PERSYARATAN_FORMAL    => 'EVALUASI',
        );
    }
}
