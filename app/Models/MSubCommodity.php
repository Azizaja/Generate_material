<?php

namespace App\Models;

use App\Models\MCommodity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MSubCommodity extends Model
{
    use HasFactory;

    protected $table = 'm_sub_commodity';

    protected $guarded = ['id'];

    public function mCommodity(): BelongsTo
    {
        return $this->belongsTo(MCommodity::class, 'commodity_id', 'id');
    }
}
