<?php

namespace App\Models;

use App\Models\Evaluasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterTahap extends Model
{
    use HasFactory;

    protected $table = 'master_tahap';

    protected $guarded = ['id'];

    public function evaluasi(): HasOne
    {
        return $this->hasOne(Evaluasi::class, 'id', 'evaluasi_id');
    }
}
