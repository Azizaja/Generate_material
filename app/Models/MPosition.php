<?php

namespace App\Models;

use App\Models\SatuanKerja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MPosition extends Model
{
    use HasFactory;

    protected $table = 'm_position';

    protected $guarded = ['id'];

    public function satuanKerja(): HasOne
    {
        return $this->hasOne(SatuanKerja::class, 'id', 'satuan_kerja_id');
    }
}
