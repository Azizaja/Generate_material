<?php

namespace App\Models;

use App\Models\PekerjaanRincian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengadaanRincian extends Model
{
    use HasFactory;

    protected $table = 'pengadaan_rincian';

    protected $guarded = ['id'];

    public function pekerjaanRincian(): HasOne
    {
        return $this->hasOne(PekerjaanRincian::class, 'id', 'pekerjaan_rincian_id');
    }
}
