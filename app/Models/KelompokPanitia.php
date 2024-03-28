<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokPanitia extends Model
{
    use HasFactory;

    protected $table = 'kelompok_panitia';

    protected $guarded = ['id'];
}
