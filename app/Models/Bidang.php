<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';

    protected $guarded = ['id'];

    public function subBidang()
    {
        return $this->hasMany(SubBidang::class, 'bidang_id', 'id');
    }
    public function kualifikasiGroupDetail(): HasMany
    {
        return $this->hasMany(KualifikasiGroupDetail::class, 'group_id', 'group_id');
    }
}
