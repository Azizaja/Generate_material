<?php

namespace App\Models;

use App\Models\Pekerjaan;
use App\Models\SubBidang;
use App\Models\KualifikasiGroupDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PekerjaanSubBidang extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_sub_bidang';

    protected $guarded = ['id'];

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }
    public function subBidang(): BelongsTo
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id', 'id');
    }
    public function kualifikasiGroupDetail(): HasOne
    {
        return $this->hasOne(KualifikasiGroupDetail::class, 'id', 'kualifikasi_group_detail_id');
    }
}
