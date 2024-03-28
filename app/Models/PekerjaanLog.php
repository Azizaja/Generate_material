<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanLog extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_log';

    protected $guarded = ['id'];
}
