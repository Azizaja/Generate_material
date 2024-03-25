<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanRincianSpec extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_rincian_spec';

    protected $guarded = ['id'];
}
