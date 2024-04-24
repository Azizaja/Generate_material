<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryHeader extends Model
{
    use HasFactory;

    protected $table = 'history_header';

    protected $guarded = ['id'];
}
