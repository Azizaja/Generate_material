<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanPemenang extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_pemenang';

    protected $guarded = ['id'];
}
