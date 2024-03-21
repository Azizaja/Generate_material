<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSubCommodity extends Model
{
    use HasFactory;

    protected $table = 'm_sub_commodity';

    protected $guarded = ['id'];
}
