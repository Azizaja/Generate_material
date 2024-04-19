<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpr extends Model
{
    use HasFactory;

    protected $table = 'cpr';

    protected $guarded = ['id'];
}
