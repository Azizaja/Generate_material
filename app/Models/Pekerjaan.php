<?php

namespace App\Models;

use App\Models\ApplicationUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';

    protected $guarded = ['id'];

    const STATUS_SEMUA = -1;
    const STATUS_PERENCANAAN = 0;
    const STATUS_MENUNGGU_PERSETUJUAN_PENGGUNA_ANGGARAN = 10;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG = 25;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_ANGGARAN = 30;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG_KEUANGAN = 35;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI_BIDANG_SDM = 37;
    const STATUS_MENUNGGU_PERSETUJUAN_DIREKSI = 40;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_OE = 43;
    const STATUS_MENUNGGU_PERSETUJUAN_TIM_OE_OPL = 45;
    const STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN = 50;
    const STATUS_MENUNGGU_PERSETUJUAN_URUSAN_P2BJ = 55;
    const STATUS_DISETUJUI = 90;
    //pjb
    const STATUS_BERJALAN = 1;
    const STATUS_BATAL = 2;
    const STATUS_SELESAI_PENGADAAN = 100;
    //end pjb
    //record untuk history
    const STATUS_REGISTER = 60;
    const STATUS_PENETAPAN = 65;
    const STATUS_BATAL_REGISTER = 70;

    const STAT_MULTI_PEMENANG = 'true';
    const STAT_NON_MULTI_PEMENANG = 'false';
    const STATUS_REV = 1;
    const STATUS_REV_FREEZE = 13;

    public function pekerjaanPanitia(): HasMany
    {
        return $this->hasMany(PekerjaanPanitia::class, 'pekerjaan_id', 'id');
    }

    public function applicationUsers()
    {
        return $this->hasManyThrough(
            ApplicationUser::class,
            PekerjaanPanitia::class,
            'pekerjaan_id', // Foreign key dari tabel pekerjaan_panitia
            'id', // Local key dari tabel pekerjaan
            'id', // Foreign key dari tabel application_user
            'user_id' // Local key dari tabel pekerjaan_panitia
        );
    }
}
