<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxPr extends Model
{
    use HasFactory;

    protected $table = 'max_pr';

    protected $guarded = ['id'];
}
