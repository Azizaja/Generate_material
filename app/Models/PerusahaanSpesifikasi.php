<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanSpesifikasi extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_spesifikasi';

    protected $guarded = ['id'];

    public function kualifikasiGroupDetail()
    {
        return $this->belongsTo(KualifikasiGroupDetail::class, 'kualifikasi_group_detail_id');
    }
    public function subBidang()
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id');
    }
    public function kualifikasi()
    {
        return $this->belongsTo(Kualifikasi::class, 'kualifikasi_id');
    }
}
