<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanIjinUsaha extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_ijin_usaha';

    protected $guarded = ['id'];
}
