<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelompok extends Model
{
    use HasFactory;

    protected $table = 'anggota_kelompok';

    protected $guarded = ['id'];
}
