<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubBidang extends Model
{
    use HasFactory;

    protected $table = 'sub_bidang';

    protected $guarded = ['id'];

    public function bidang(): HasOne
    {
        return $this->hasOne(Bidang::class, 'id', 'bidang_id');
    }
}
