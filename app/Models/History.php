<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';
    public $timestamps = false;
    protected $guarded = ['id'];

    const BUAT_PAKET = 'BUAT_PAKET';
    const TIM_PANITIA = 'TIM_PANITIA';
    const SETTING_PEKERJAAN = 'SETTING_PEKERJAAN';
    const UNDANG_PENYEDIA = 'UNDANG_PENYEDIA';
    const HAPUS_PEKERJAAN = 'HAPUS_PEKERJAAN';
    const REGISTER_PEKERJAAN = 'REGISTER_PEKERJAAN';
    const BATAL_REGISTER_PENGADAAN = 'BATAL_REGISTER_PENGADAAN';
    const PERSYARATAN_PEKERJAAN = 'PERSYARATAN_PEKERJAAN';
    const LAKSANAKAN = 'LAKSANAKAN';
    const PENDAFTARAN_VENDOR = 'PENDAFTARAN_VENDOR';
    const PEMASUKAN_PENAWARAN = 'PEMASUKAN_PENAWARAN';
    const PEMBUKAAN_PENAWARAN = 'PEMBUKAAN_PENAWARAN';
    const PROSES_EVALUASI = 'PROSES_EVALUASI';
    const KOREKSI_NILAI_ARIMATIK = 'KOREKSI_NILAI_ARIMATIK';
    const PENETAPAN_PEMENANG = 'PENETAPAN_PEMENANG';
    const NEGOSIASI = 'NEGOSIASI';
    const PENUNJUKAN_PEMENANG = 'PENUNJUKAN_PEMENANG';
    const SELESAI_PENGADAAN = 'SELESAI_PENGADAAN';

    public static function getStatusHistoryPekerjaanArray()
    {
        return array(
            Pekerjaan::STATUS_PERENCANAAN => Pekerjaan::STATUS_PERENCANAAN,
            Pekerjaan::STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN => Pekerjaan::STATUS_MENUNGGU_PERSETUJUAN_URUSAN_PENGADAAN,
            Pekerjaan::STATUS_BERJALAN => Pekerjaan::STATUS_BERJALAN,
            Pekerjaan::STATUS_SELESAI_PENGADAAN => Pekerjaan::STATUS_SELESAI_PENGADAAN,
            Pekerjaan::STATUS_BATAL => Pekerjaan::STATUS_BATAL
        );
    }

    public static function getStatusHistoryPekerjaan($status)
    {
        $arr_status_string = self::getStatusHistoryPekerjaanArray();
        return $arr_status_string[$status];
    }
}
