<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCommodity extends Model
{
    use HasFactory;

    protected $table = 'm_commodity';

    protected $guarded = ['id'];
}
