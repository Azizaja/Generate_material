<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanAdministrasi extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_administrasi';

    protected $guarded = ['id'];
}
