<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MCommodity extends Model
{
    use HasFactory;

    protected $table = 'm_commodity';

    protected $guarded = ['id'];

    public function mSubCommoditiy(): HasMany
    {
        return $this->hasMany(MSubCommodity::class, 'commodity_id', 'id');
    }
}
