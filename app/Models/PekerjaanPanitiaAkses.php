<?php

namespace App\Models;

use App\Models\PekerjaanPanitia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PekerjaanPanitiaAkses extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_panitia_akses';

    protected $guarded = ['id'];

    const AKSES_UNDANGAN_PENYEDIA           = 'UNDANGAN_PENYEDIA';
    const AKSES_REGISTER_PEKERJAAN          = 'REGISTER_PEKERJAAN';
    const AKSES_HAPUS_PEKERJAAN             = 'HAPUS_PEKERJAAN';
    const AKSES_UPLOAD_DOKUMEN              = 'UPLOAD_DOKUMEN';
    const AKSES_UBAH_JADWAL                 = 'UBAH_JADWAL';
    const AKSES_APPROVAL_LAKSANAKAN_LELANG  = 'APPROVAL_LAKSANAKAN_LELANG';
    const AKSES_PEMBUKAAN_PENAWARAN         = 'PEMBUKAAN_PENAWARAN';
    const AKSES_EVALUASI_ADMINISTRASI       = 'EVALUASI_ADMINISTRASI';
    const AKSES_EVALUASI_TEKNIS             = 'EVALUASI_TEKNIS';
    const AKSES_EVALUASI_KEWAJARAN_HARGA    = 'EVALUASI_KEWAJARAN_HARGA';
    const AKSES_EVALUASI_KUALIFIKASI        = 'EVALUASI_KUALIFIKASI';
    const AKSES_KLARIFIKASI                 = 'KLARIFIKASI';
    const AKSES_NEGOSIASI                   = 'KLARIFIKASI_DAN_NEGOSIASI_TEKNIS_DAN_BIAYA';
    const AKSES_HPS                         = 'HPS';
    const AKSES_PENETAPAN_PEMENANG          = 'PENETAPAN_PEMENANG';
    const AKSES_MASA_SANGGAH                = 'MASA_SANGGAH';
    const AKSES_PENUNJUKAN_PEMENANGAN       = 'PENUNJUKAN_PEMENANG';
    const AKSES_KONTRAK                     = 'PENANDATANGANAN_KONTRAK';
    const AKSES_APPROVAL_UNDANG_PENYEDIA    = 'APPROVAL_UNDANG_PENYEDIA';

    const APPROVAL_SUKSES    = 1;
    const APPROVAL_BATAL     = -1;

    const KODE_AKSES    = 1;
    const KODE_APPROVE    = 2;
    const KODE_READONLY    = 3;

    public function pekerjaanPanitia(): BelongsTo
    {
        return $this->belongsTo(PekerjaanPanitia::class, 'pekerjaan_panitia_id', 'id');
    }
}
