<?php

use App\Models\Pekerjaan;
use App\Models\PekerjaanPanitia;
use App\Models\PekerjaanPanitiaAkses;

class PekerjaanPanitiaAksesHelper
{

    public static function getArrayAkses()
    {
        $arr = array();
        $arr[PekerjaanPanitiaAkses::AKSES_UNDANGAN_PENYEDIA]         = 'Undang Penyedia'; //pekerjaan, pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_REGISTER_PEKERJAAN]         = 'Register Pekerjaan'; //pekerjaan
        $arr[PekerjaanPanitiaAkses::AKSES_HAPUS_PEKERJAAN]             = 'Hapus Pekerjaan'; //pekerjaan
        $arr[PekerjaanPanitiaAkses::AKSES_UPLOAD_DOKUMEN]             = 'Upload Dokumen'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_UBAH_JADWAL]                 = 'Mengubah Jadwal'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_APPROVAL_LAKSANAKAN_LELANG] = 'Laksanakan Lelang '; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PEMBUKAAN_PENAWARAN]         = 'Pembukaan Penawaran'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_ADMINISTRASI]     = 'Evaluasi Administrasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_TEKNIS]             = 'Evaluasi Teknis'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_KEWAJARAN_HARGA]     = 'Evaluasi Kewajaran Harga'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_KUALIFIKASI]         = 'Evaluasi Kualifikasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_KLARIFIKASI]                 = 'Beauty Contest'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_NEGOSIASI]                 = 'Negosiasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PENETAPAN_PEMENANG]         = 'Penetapan Pemenang'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_MASA_SANGGAH]                 = 'Masa Sanggah'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PENUNJUKAN_PEMENANGAN]     = 'Penunjukan Pemenang'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_KONTRAK]                     = 'Pembuatan Kontrak'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_HPS]                     = 'Mengakses HPS'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_APPROVAL_UNDANG_PENYEDIA] = 'Approval Undang Penyedia'; //pengadaan

        return $arr;
    }

    public static function isAllowed(Pekerjaan $pekerjaan, $akses_id = null)
    {
        if (config('app.approval.panitia')) {
            $arr_akses = self::getArrayAkses();
            if (array_key_exists($akses_id, $arr_akses)) {

                // Mengambil ID pengguna yang sedang masuk
                $user_id = 20301;

                // Mencari pekerjaan_panitia berdasarkan pekerjaan ID dan user ID
                $pekerjaan_panitia = PekerjaanPanitia::where('pekerjaan_id', $pekerjaan->id)
                    ->where('user_id', $user_id)
                    ->first();

                if ($pekerjaan_panitia) {
                    // Jika pekerjaan_panitia ditemukan, mencari pekerjaan_panitia_akses berdasarkan PEKERJAAN_PANITIA_ID dan akses_id
                    $pekerjaan_panitia_akses = PekerjaanPanitiaAkses::where('PEKERJAAN_PANITIA_ID', $pekerjaan_panitia->id)
                        ->where('AKSES', $akses_id)
                        ->first();

                    // Jika pekerjaan_panitia_akses ditemukan, izinkan akses
                    if ($pekerjaan_panitia_akses) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
    public static function getArrayApprove()
    {
        $arr = array();
        $arr[PekerjaanPanitiaAkses::AKSES_REGISTER_PEKERJAAN]         = 'Register Pekerjaan'; //pekerjaan
        $arr[PekerjaanPanitiaAkses::AKSES_APPROVAL_LAKSANAKAN_LELANG] = 'Laksanakan Lelang'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PEMBUKAAN_PENAWARAN]         = 'Pembukaan Penawaran'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_ADMINISTRASI]     = 'Evaluasi Administrasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_TEKNIS]             = 'Evaluasi Teknis'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_KEWAJARAN_HARGA]     = 'Evaluasi Kewajaran Harga'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_EVALUASI_KUALIFIKASI]         = 'Evaluasi Kualifikasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_KLARIFIKASI]                 = 'Beauty Contest'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_NEGOSIASI]                 = 'Negosiasi'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PENETAPAN_PEMENANG]         = 'Penetapan Pemenang'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_MASA_SANGGAH]                 = 'Masa Sanggah'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_PENUNJUKAN_PEMENANGAN]     = 'Penunjukan Pemenang'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_APPROVAL_UNDANG_PENYEDIA] = 'Approval Undang Penyedia'; //pengadaan
        $arr[PekerjaanPanitiaAkses::AKSES_UBAH_JADWAL]                 = 'Mengubah Jadwal'; //pengadaan

        return $arr;
    }

    public static function getValueAkses($kode, $pekerjaan_panitia_id)
    {
        $pekerjaan_panitia_aksess = PekerjaanPanitiaAkses::where('pekerjaan_panitia_id', $pekerjaan_panitia_id)
            ->where('akses', $kode)
            ->get();

        $kodeAkses = null;
        foreach ($pekerjaan_panitia_aksess as $pekerjaan_panitia_akses) {
            if ($pekerjaan_panitia_akses->sequence) {
                $kodeAkses = PekerjaanPanitiaAkses::KODE_APPROVE;
            } else if ($pekerjaan_panitia_akses->read_only) {
                $kodeAkses = PekerjaanPanitiaAkses::KODE_READONLY;
            } else {
                $kodeAkses = PekerjaanPanitiaAkses::KODE_AKSES;
            }
        }

        return $kodeAkses;
    }
    public static function getPanitiaApproveByPekerjaanPanitia($approve, $pekerjaan_panitia_id = false)
    {
        $query = PekerjaanPanitiaAkses::query();

        if ($pekerjaan_panitia_id) {
            $query->where('pekerjaan_panitia_id', $pekerjaan_panitia_id);
        }
        $result = $query
            ->where('akses', $approve)
            ->where('sequence', '>', 0)
            ->first();

        return $result;
    }
}
