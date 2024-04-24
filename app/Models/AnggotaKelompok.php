<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelompok extends Model
{
    use HasFactory;

    protected $table = 'anggota_kelompok';

    protected $guarded = ['id'];

    const JABATAN_PPK             = 0;
    const JABATAN_KETUA         = 1;
    const JABATAN_SEKRETARIS    = 2;
    const JABATAN_ANGGOTA         = 3;
    const JABATAN_ANGGOTA2         = 4;
    const JABATAN_ANGGOTA3         = 5;
}
