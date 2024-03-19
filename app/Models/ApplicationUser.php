<?php

namespace App\Models;

use App\Models\PekerjaanPanitia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationUser extends Model
{
    use HasFactory;

    protected $table = 'application_user';

    protected $guarded = ['id'];

    public function pekerjaanPanitia(): HasMany
    {
        return $this->hasMany(PekerjaanPanitia::class, 'user_id', 'id');
    }
}
