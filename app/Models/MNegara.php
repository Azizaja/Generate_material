<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MNegara extends Model
{
    use HasFactory;

    protected $table = 'm_negara';

    protected $guarded = ['id'];
}
