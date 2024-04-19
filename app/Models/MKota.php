<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKota extends Model
{
    use HasFactory;

    protected $table = 'm_kota';

    protected $guarded = ['id'];

    public function mPropinsi()
    {
        return $this->belongsTo(MPropinsi::class, 'propinsi_id');
    }
}
