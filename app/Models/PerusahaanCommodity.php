<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanCommodity extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_commodity';

    protected $guarded = ['id'];
}
