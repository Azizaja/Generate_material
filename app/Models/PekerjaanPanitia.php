<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PekerjaanPanitia extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_panitia';

    protected $guarded = ['id'];

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }

    public function applicationUser(): HasMany
    {
        return $this->hasMany(ApplicationUser::class, 'user_id', 'id');
    }
}
