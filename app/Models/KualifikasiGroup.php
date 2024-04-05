<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualifikasiGroup extends Model
{
    use HasFactory;

    protected $table = 'kualifikasi_group';

    protected $guarded = ['id'];
}
