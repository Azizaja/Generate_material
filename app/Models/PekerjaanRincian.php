<?php

namespace App\Models;

use App\Models\MaxPr;
use App\Models\Pekerjaan;
use App\Models\PekerjaanRincianSpec;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function pekerjaanRincianSpec(): HasMany
    {
        return $this->hasMany(PekerjaanRincianSpec::class, 'pekerjaan_rincian_id', 'id');
    }
}
