<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPropinsi extends Model
{
    use HasFactory;

    protected $table = 'm_propinsi';

    protected $guarded = ['id'];

    public function mNegara()
    {
        return $this->belongsTo(MNegara::class, 'negara_id');
    }
}
