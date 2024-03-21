<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualifikasiGroupDetail extends Model
{
    use HasFactory;

    protected $table = 'kualifikasi_group_detail';

    protected $guarded = ['id'];
}
