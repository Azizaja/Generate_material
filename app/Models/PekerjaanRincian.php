<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PekerjaanRincian extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_rincian';

    protected $guarded = ['id'];

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }

    public function maxPr(): HasOne
    {
        return $this->hasOne(MaxPr::class, 'id', 'pr_id');
    }
}
