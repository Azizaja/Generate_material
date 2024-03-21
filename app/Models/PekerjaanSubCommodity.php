<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PekerjaanSubCommodity extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_sub_commodity';

    protected $guarded = ['id'];

    public function mSubCommodity(): BelongsTo
    {
        return $this->belongsTo(MSubCommodity::class, 'sub_commodity_id', 'id');
    }
}
