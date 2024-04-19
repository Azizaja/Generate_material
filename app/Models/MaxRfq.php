<?php

namespace App\Models;

use App\Models\MaxRfqline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaxRfq extends Model
{
    use HasFactory;

    protected $table = 'max_rfq';

    protected $guarded = ['id'];

    const BARU         = 0;
    const PEKERJAAN = 10;
    const PENGADAAN = 20;
    const REVISI     = 30;
    const REV_APP     = 35;
    const REV_REJ     = 40;
    const CLOSE     = 50;

    public function MaxRfqline(): HasMany
    {
        return $this->hasMany(MaxRfqline::class, 'rfq_id', 'id');
    }
}
