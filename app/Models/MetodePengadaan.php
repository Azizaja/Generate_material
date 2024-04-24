<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MetodePengadaan extends Model
{
    use HasFactory;

    protected $table = 'metode_pengadaan';

    protected $guarded = ['id'];

    const PENILAIAN_PRAKUALIFIKASI = 'PRAKUALIFIKASI';
    const PENILAIAN_PASCAKUALIFIKASI = 'PASCAKUALIFIKASI';
    const PENUNJUKAN_LANGSUNG = 'PENUNJUKAN_LANGSUNG';
    const PEMILIHAN_LANGSUNG = 'PEMILIHAN_LANGSUNG';
    const PENUNJUKAN_LANGSUNG_ID = 36;
    const PEMILIHAN_LANGSUNG_ID  = 37;
    const PEMBELIAN_LANGSUNG_ID = 35;

    public function metodeEvaluasiPenawaran(): HasOne
    {
        return $this->hasOne(MetodeEvaluasiPenawaran::class, 'id', 'metode_evaluasi_penawaran_id');
    }

    public function masterTahap(): HasMany
    {
        return $this->hasMany(MasterTahap::class, 'master_metode_pengadaan_id', 'master_metode_pengadaan_id');
    }

    public function sistemPengadaan(): BelongsTo
    {
        return $this->belongsTo(SistemPengadaan::class, 'sistem_pengadaan_id', 'id');
    }
}
