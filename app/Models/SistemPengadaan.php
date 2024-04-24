<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemPengadaan extends Model
{
    use HasFactory;

    protected $table = 'sistem_pengadaan';

    protected $guarded = ['id'];
}
