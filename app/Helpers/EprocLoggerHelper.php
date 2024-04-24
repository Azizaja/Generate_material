<?php

use App\Models\History;
use App\Models\PekerjaanLog;
use App\Models\HistoryHeader;
use App\Models\ApplicationUser;

class EprocLoggerHelper
{
    public static function HistoryHeaderlog($pekerjaan_id, $kode_pekerjaan, $nama_pekerjaan, $status, $pengadaan_id = null)
    {
        $history_header = new HistoryHeader();
        $history_header->pekerjaan_id = $pekerjaan_id;
        $history_header->pengadaan_id = $pengadaan_id;
        $history_header->kode_pekerjaan = $kode_pekerjaan;
        $history_header->nama_pekerjaan = $nama_pekerjaan;
        $history_header->status_terakhir = $status;
        $history_header->created_at = date("Y-m-d H:i:s");
        $history_header->updated_at = date("Y-m-d H:i:s");
        $history_header->created_by = ApplicationUser::find(20300)->nama;
        $history_header->updated_by = ApplicationUser::find(20300)->nama;
        $history_header->instansi_id = ApplicationUser::find(20300)->instansi_id;
        $history_header->satuan_kerja_id = ApplicationUser::find(20300)->satuan_kerja_id;

        $history_header->save();
    }
    public static function getHistorylogId($pekerjaan_id, $deskripsi, $status, $kode_tahap = null, $pengadaan_id = null)
    {

        $history = new History();
        $history->user_nama = ApplicationUser::find(20300)->nama;
        // if (sfContext::getInstance()->getUser()->isPenyedia()) {
        //     $history->setUserNama(sfContext::getInstance()->getUser()->getLogNama());
        // } else {
        //     $history->setUserNama(sfContext::getInstance()->getUser()->getNama() . ' / ' . sfContext::getInstance()->getUser()->getLogNama());
        // }
        $history->pekerjaan_id = $pekerjaan_id;
        $history->alasan = $deskripsi;
        $history->status = $status;
        $history->created_at = date("Y-m-d H:i:s");
        $history->ip_address = request()->ip();
        $history->pengadaan_id = $pengadaan_id;
        $history->kode_tahap = $kode_tahap;

        $history->save();

        return $history->id;
    }

    public static function Pekerjaanlog(
        $kode,
        $judul,
        $deskripsi,
        $status,
        $history_id,
        $pekerjaan_id,
        $pengadaan_id = null,
        $penawaran_id = null,
        $pengadaan_tahap_id = null,
        $penawaran_tahap_id = null,
        $perusahaan_id = null
    ) {

        $history = new PekerjaanLog();
        // if (sfContext::getInstance()->getUser()->isPenyedia()) {
        //     $history->setUserName(sfContext::getInstance()->getUser()->getLogNama());
        // } else {
        //     $history->setUserName(sfContext::getInstance()->getUser()->getNama() . ' / ' . sfContext::getInstance()->getUser()->getLogNama());
        // }
        $history->user_name = ApplicationUser::find(20300)->nama;
        $history->pekerjaan_id = $pekerjaan_id;
        $history->pengadaan_id = $pengadaan_id;
        $history->penawaran_id = $penawaran_id;
        $history->pengadaan_tahap_id = $pengadaan_tahap_id;
        $history->penawaran_tahap_id = $penawaran_tahap_id;
        $history->perusahaan_id = $perusahaan_id;

        $history->kode = $kode;
        $history->judul = $judul;
        $history->deskripsi = $deskripsi;
        $history->state = $status;

        $history->created_at = date("Y-m-d H:i:s");
        $history->updated_at = date("Y-m-d H:i:s");
        $history->ip_address = request()->ip();
        $history->user_id = ApplicationUser::find(20300)->id;
        $history->history_id = $history_id;

        $history->save();
    }
}
