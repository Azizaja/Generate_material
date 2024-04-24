<?php

namespace App\Models;

use App\Models\Pekerjaan;
use App\Models\AnggotaKelompok;
use App\Models\ApplicationUser;
use App\Models\KelompokPanitia;
use App\Models\PekerjaanPanitiaAkses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PekerjaanPanitia extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_panitia';

    protected $guarded = ['id'];

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'id');
    }

    public function applicationUser(): HasOne
    {
        return $this->hasOne(ApplicationUser::class, 'id', 'user_id');
    }

    public function kelompokPanitia(): HasOne
    {
        return $this->hasOne(KelompokPanitia::class, 'id', 'kelompok_panitia_id');
    }
    public function pekerjaanPanitiaAkses(): Hasone
    {
        return $this->hasOne(PekerjaanPanitiaAkses::class, 'pekerjaan_panitia_id', 'id');
    }

    const JABATAN_PPK             = AnggotaKelompok::JABATAN_PPK;
    const JABATAN_KETUA         = AnggotaKelompok::JABATAN_KETUA;
    const JABATAN_SEKRETARIS     = AnggotaKelompok::JABATAN_SEKRETARIS;
    const JABATAN_ANGGOTA1         = AnggotaKelompok::JABATAN_ANGGOTA;
    const JABATAN_ANGGOTA2         = AnggotaKelompok::JABATAN_ANGGOTA2;
    const JABATAN_ANGGOTA3         = AnggotaKelompok::JABATAN_ANGGOTA3;
}
