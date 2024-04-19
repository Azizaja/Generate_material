<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxRfqline extends Model
{
    use HasFactory;

    protected $table = 'max_rfqline';

    protected $guarded = ['id'];
}
