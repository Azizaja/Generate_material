<?php

namespace App\Models;

use App\Models\PekerjaanPanitia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ApplicationUser extends Model
{
    use HasFactory;

    protected $table = 'application_user';

    protected $guarded = ['id'];

    const TIPE_ADMINISTRATOR_SUPER = 1;
    const TIPE_ADMINISTRATOR_OTORITAS = 2;
    const TIPE_ADMINISTRATOR_OPERASIONAL = 3;
    const TIPE_PPK = 4;
    const TIPE_PANITIA = 5;
    const TIPE_AUDITOR = 6;
    // const TIPE_ADMINISTRATOR_HELPDESK = 6;
    const TIPE_KONSELOR = 7;
    const TIPE_PENGGUNA_ANGGARAN = 8;
    const TIPE_STAFF_PENGGUNA_ANGGARAN = 9;
    const TIPE_DIREKTUR_UNIT_PENGADAAN = 11;
    const TIPE_PENGELOLA_ADMIN_LEGAL = 12;
    const TIPE_ADMINISTRATOR_REGISTER = 13;
    const TIPE_KUASA_PENGGUNA_ANGGARAN = 14;
    const TIPE_TIM_ANGGARAN = 14;
    const TIPE_DIREKSI = 15;
    const TIPE_DIREKSI_BIDANG_RENBANG = 16;
    const TIPE_KEPATUHAN = 17;
    const TIPE_TIM_OE = 18;
    const TIPE_DIREKSI_BIDANG_KEUANGAN = 19;
    const TIPE_DIREKSI_BIDANG_SDM = 20;
    const TIPE_TIME_OE_OPL = 21;
    const TIPE_DIREKTUR_UNIT_P2BJ = 22;
    const TIPE_SEKPER = 23;
    const TIPE_DIREKSI_BIDANG_PRODUKSI = 24;
    const TIPE_ADMINISTRATOR_OPERASIONAL_CABANG = 30;
    const TIPE_PIMPINAN_CABANG = 35;
    const TIPE_BPO = 36;
    const TIPE_PUCHASING_MANAGER = 37;
    const TIPE_TIM_TEKNIS = 38;
    const TIPE_FORWARDER = 39;
    const TIPE_WAREHOUSE = 40;

    public function pekerjaanPanitia(): HasMany
    {
        return $this->hasMany(PekerjaanPanitia::class, 'user_id', 'id');
    }

    public function mPosition(): HasMany
    {
        return $this->hasMany(MPosition::class, 'application_user_id', 'id');
    }

    public function satuanKerja(): HasOne
    {
        return $this->hasOne(SatuanKerja::class, 'id', 'satuan_kerja_id');
    }

    public static function doSelectPanitiaByInstansiSatuanKerjaAsNestedArray($instansi_id = null, $satuan_kerja_id = null)
    {
        //$user = ApplicationUser::where('id', 20301)->first();

        $users = self::where('instansi_id', $instansi_id)
            //->where('satuan_kerja_id', $satuan_kerja_id)
            ->where('tipe_user_id', self::TIPE_PANITIA)
            ->get();
        //if cridential ... , can edit after adding auth
        // if ($satuan_kerja_id !== null && !$user->isDirekturUnitP2bj() && !$user->isAdministratorOperasional() && !$user->isAdministratorSuper() && !$user->isPanitia()) {
        //     $critcopy->add(self::SATUAN_KERJA_ID, $satuan_kerja_id);
        // }
        $result = array();
        foreach ($users as $user) {
            $result[$user->satuanKerja->nama][] = $user->nama;
        }

        return $result;
    }
    public static function doSelectPanitiaByInstansiSatuanKerjaAsArray($instansi_id = null, $satuan_kerja_id = null)
    {
        //$user = ApplicationUser::where('id', 20301)->first();

        $users = self::where('instansi_id', $instansi_id)
            //->where('satuan_kerja_id', $satuan_kerja_id)
            ->where('tipe_user_id', self::TIPE_PANITIA)
            ->get();
        //if cridential ... , can edit after adding auth
        // if ($satuan_kerja_id !== null && !$user->isDirekturUnitP2bj() && !$user->isAdministratorOperasional() && !$user->isAdministratorSuper() && !$user->isPanitia()) {
        //     $critcopy->add(self::SATUAN_KERJA_ID, $satuan_kerja_id);
        // }
        $result = array();
        foreach ($users as $user) {
            $result[] = $user->nama;
        }

        return $result;
    }

    public function getUserKodeJabatan()
    {
        $sekarang = date("Y-m-d");
        $m_position = MPosition::where('application_user_id', $this->id)
            ->where('begin_date', '<=', $sekarang)
            ->where(function ($query) use ($sekarang) {
                $query->whereDate('end_date', '>', $sekarang)
                    ->orWhereNull('end_date');
            })
            ->first();
        if ($m_position) {
            return $m_position->position;
        } else {
            return 'Tidak Memiliki Jabatan';
        }
    }
}
