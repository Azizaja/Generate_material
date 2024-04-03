<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';

    protected $guarded = ['id'];

    const KUALIFIKASI = 1;
    const ADMINISTRASI = 2;
    const TEKNIS = 3;
    const KEWAJARAN_HARGA = 4;
    const NILAI_TEKNIS = 5;
    const PEMBUKTIAN_KUALIFIKASI = 7;
}
