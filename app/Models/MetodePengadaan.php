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

    public function MetodeEvaluasiPenawaran(): HasOne
    {
        return $this->hasOne(MetodeEvaluasiPenawaran::class, 'id', 'metode_evaluasi_penawaran_id');
    }
}
