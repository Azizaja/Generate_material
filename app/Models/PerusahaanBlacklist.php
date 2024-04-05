<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanBlacklist extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_blacklist';

    protected $guarded = ['id'];

    const STATUS_DRAFT = 0;
    const STATUS_DISETUJUI = 1;
    const STATUS_SELESAI = 2;
    const STATUS_BATAL = 3;
    const STATUS_REQUEST_BATAL = 4;
}
