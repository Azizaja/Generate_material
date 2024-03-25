<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class penawaran extends Model
{
    use HasFactory;

    protected $table = 'penawaran';

    protected $guarded = ['id'];

    public function perusahaan(): HasOne
    {
        return $this->hasOne(perusahaan::class, 'id', 'perusahaan_id');
    }
}
