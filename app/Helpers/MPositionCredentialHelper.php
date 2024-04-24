<?php

use App\Models\MPositionCredential;

class MPositionCredentialHelper
{
    public static function getInAkses($kode, $akses)
    {
        $MPositionCredential = MPositionCredential::where('state', 0)
            ->where('kode', $kode)
            ->where('akses', $akses)
            ->get();
        if (!$MPositionCredential->isEmpty()) {
            return true;
        }
        return false;
    }
    public static function getInAksesReadonly($kode, $akses)
    {
        $MPositionCredential = MPositionCredential::where('state', 0)
            ->where('kode', $kode)
            ->where('akses', $akses)
            ->where('status_lihat', 1)
            ->get();

        if (!$MPositionCredential->isEmpty()) {
            return true;
        }
        return false;
    }

    public static function getInApprove($kode, $akses)
    {
        $MPositionCredential = MPositionCredential::where('state', 1)
            ->where('kode', $kode)
            ->where('akses', $akses)
            ->get();
        if (!$MPositionCredential->isEmpty()) {
            return true;
        }
        return false;
    }
}
