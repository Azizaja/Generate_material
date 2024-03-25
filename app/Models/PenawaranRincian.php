<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PenawaranRincian extends Model
{
    use HasFactory;

    protected $table = 'penawaran_rincian';

    protected $guarded = ['id'];

    public function pengadaanRincian(): HasOne
    {
        return $this->hasOne(PengadaanRincian::class, 'id', 'pengadaan_rincian_id');
    }
}
