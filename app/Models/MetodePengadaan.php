<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MetodePengadaan extends Model
{
    use HasFactory;

    protected $table = 'metode_pengadaan';

    protected $guarded = ['id'];

    public function metodeEvaluasiPenawaran(): HasOne
    {
        return $this->hasOne(MetodeEvaluasiPenawaran::class, 'id', 'metode_evaluasi_penawaran_id');
    }

    public function masterTahap(): HasMany
    {
        return $this->hasMany(MasterTahap::class, 'master_metode_pengadaan_id', 'master_metode_pengadaan_id');
    }
}
