<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanSubCommodity extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_sub_commodity';

    protected $guarded = ['id'];
}
