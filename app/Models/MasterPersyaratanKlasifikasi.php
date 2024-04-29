<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPersyaratanKlasifikasi extends Model
{
    use HasFactory;

    protected $table = 'master_persayratan_klasifikasi';

    protected $guarded = ['id'];
}
