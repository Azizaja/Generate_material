<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';

    protected $guarded = ['id'];

    const JENIS_PESAN                         = 'pesan';
    const JENIS_BLACKLIST_SATKER            = 'blacklist_satker';
    const JENIS_BLACKLIST_SUBBID            = 'blacklist_subbid';
    const JENIS_BLACKLIST_JUMLAH_LELANG        = 'blacklist_jml_lelang';
    const JENIS_DOKUMEN_BUAT_DRAFT             = 'upload_draft';
    const JENIS_DOKUMEN_INFORMASI             = 'informasi';
    const JENIS_DOKUMEN_PRESENTASI            = 'presentasi';
    // -----------------------------------------------------------------
    const JENIS_PAKTA                         = 'pakta_integritas';
    const JENIS_DRT                         = 'drt';
    const JENIS_DOKUMEN_LELANG                 = 'rks';
    const JENIS_PENGUMUMAN_LELANG             = 'pengumuman_lelang';
    const JENIS_UNDANGAN_VENDOR             = 'undangan_pph';
    const JENIS_BA_AANWIJZING                = 'ba_aanwijzing';
    const JENIS_BA_PRAKUALIFIKASI            = 'ba_prakualifikasi';
    const JENIS_BA_KLARIFIKASI                = 'ba_klarifikasi';
    const JENIS_BA_SANGGAHAN                = 'sanggahan';
    const JENIS_PENAWARAN_PRAKUALIFIKASI     = 'penawaran_prakualifikasi';
    const JENIS_PENAWARAN_ADMINISTRASI         = 'penawaran_administrasi';
    const JENIS_PENAWARAN_TEKNIS             = 'penawaran_teknis';
    const JENIS_PENAWARAN_HARGA                = 'penawaran_harga';
    const JENIS_PENAWARAN_DOKUMEN            = 'penawaran_dokumen'; //Khusus POMI
    const JENIS_BAPP                         = 'bapp';
    const JENIS_BAPP_SAMPUL_1                = 'bapp_sampul_1';
    const JENIS_BAPP_SAMPUL_2                = 'bapp_sampul_2';
    const JENIS_BAPP_TAHAP_1                 = 'bapp_tahap_1';
    const JENIS_BAPP_TAHAP_2                 = 'bapp_tahap_2';
    const JENIS_BA_EV_ADMIN                 = 'ba_evaluasi_administrasi';
    const JENIS_BA_EV_TEKNIS                 = 'ba_evaluasi_teknis';
    const JENIS_LAMPIRAN_PERHITUNGAN_TEKNIS_NILAI    = 'lampiran_perhitungan_teknis_nilai';
    const JENIS_BA_EV_HARGA                         = 'ba_evaluasi_harga';
    const JENIS_BA_EV_KUALIFIKASI                    = 'ba_evaluasi_kualifikasi';
    const JENIS_KOREKSI_ARITMATIK                     = 'koreksi_aritmatik';
    const JENIS_LAMPIRAN_KOREKSI_ARITMATIK             = 'lampiran_koreksi_aritmatik';
    const JENIS_PEMBUKTIAN_KUALIFIKASI                = 'pembuktian_kualifikasi';
    const JENIS_BA_HASIL_EV_SAMPUL_1                 = 'ba_hasil_ev_sampul_2';
    const JENIS_BA_HASIL_EV_SAMPUL_2                 = 'ba_hasil_ev_sampul_2';
    const JENIS_BA_HASIL_EV_TAHAP_1                 = 'ba_hasil_ev_tahap_1';
    const JENIS_BA_HASIL_EV_TAHAP_2                 = 'ba_hasil_ev_tahap_2';
    const JENIS_BAHP                             = 'bahp';
    const JENIS_UNDANGAN_NEGOSIASI                = 'undangan_negosiasi';
    const JENIS_FORM_NEGOSIASI                    = 'form_negosiasi';
    const JENIS_FORMREGIS                         = 'form_registrasi';
    const JENIS_BA_NEGOSIASI                    = 'ba_negosiasi';
    const JENIS_SURAT_NEGOSIASI                    = 'surat_negosiasi';
    const JENIS_MOSUL_NEGOSIASI                 = 'mosul_negosiasi';
    const JENIS_UNDANGAN_KLARIFIKASI            = 'undangan_klarifikasi';
    const JENIS_USULAN_CALON_PEMENANG            = 'usulan_calon_pemenang';
    const JENIS_KLARIFIKASI                        = 'ba_klarifikasi';
    const JENIS_PENETAPAN_PEMENANG                 = 'penetapan_pemenang';
    const JENIS_DOKUMEN_PENGUMUMAN_PEMENANG     = 'pengumuman_pemenang';
    const JENIS_SANGGAHAN                         = 'sanggahan';
    const JENIS_PENUNJUKAN_PEMENANG                = 'penunjukan_pemenang';
    const JENIS_SPK                                = 'spk';
    const JENIS_PO                                = 'PO';
    const JENIS_INVOICE                            = 'invoice';
    const JENIS_KONTRAK                         = 'kontrak';
    const JENIS_NOTIFIKASI                         = 'notifikasi';
    const JENIS_ASSASSMENT                         = 'assassment';
    const JENIS_DLL                             = 'lain-lain';
    const JENIS_UNDEFINED                        = 'undefined';
    const JENIS_APPROVE                          = 'approve';
    //const JENIS_DOMISILI  						= 'domisili';

    const JENIS_PENGUMUMAN                         = 'pengumuman';
    const JENIS_IJIN_GAGAL_LELANG                 = 'ijin_gagal_lelang';
    const JENIS_PERUSAHAAN_SIUP                 = 'SIUP';
    const JENIS_PERUSAHAAN_IUJK                 = 'IUJK';
    const JENIS_PERUSAHAAN_AKTA                 = 'AKTA';
    const JENIS_PERUSAHAAN_SPT                     = 'SPT';
    const JENIS_PERUSAHAAN_PAJAK                = 'PAJAK';
    const JENIS_PERUSAHAAN_NERACA                 = 'PERUSAHAAN KEUANGAN';
    const JENIS_PERUSAHAAN_LABARUGI             = 'LABA-RUGI';
    const JENIS_PERUSAHAAN_AKTA_PERUBAHAN        = 'AKTA PERUBAHAN';
    const JENIS_PERUSAHAAN_SITU                 = 'SITU';
    const JENIS_PERUSAHAAN_TDP                     = 'TDP';
    const JENIS_PERUSAHAAN_NIB                     = 'NIB';
    const JENIS_PERUSAHAAN_SPPKP                 = 'SPPKP';
    const JENIS_PERUSAHAAN_SURAT_KEAGENAN         = 'SURAT KEAGENAN';
    const JENIS_PERUSAHAAN_REFERENSI_BANK        = 'REFERENSI BANK';
    const JENIS_PERUSAHAAN_NPWP                 = 'NPWP';
    const JENIS_PERUSAHAAN_STRUKTUR_ORGANISASI  = 'STRUKTUR ORGANISASI';

    const JENIS_PERUSAHAAN_IJIN_USAHA = 'IJIN USAHA YANG LAIN';
    const JENIS_PERUSAHAAN_SERTIFIKASI_ISO = 'SERTIFIKASI ISO';
    const JENIS_PERUSAHAAN_KEANGGOTAAN_KADIN  = 'KEANGGOTAAN KADIN';
    const JENIS_PERUSAHAAN_PENUNJUKAN_KEAGENAN = 'PENUNJUKAN KEAGENAN';
    const JENIS_PERUSAHAAN_CATALOG_PRODUK = 'CATALOG PRODUK';






    const JENIS_SKALA_MICRO                        = 'MICRO';
    const JENIS_SKALA_KECIL                     = 'KECIL';
    const JENIS_SKALA_MENENGAH                     = 'MENENGAH';
    const JENIS_SKALA_BESAR                     = 'BESAR';
    //const JENIS_PERUSAHAAN_TIN 				= 'TIN';
    const JENIS_PERUSAHAAN_PAKTA                = 'PAKTA INTEGRITAS';
    const JENIS_PERUSAHAAN_SBU                    = 'SBU';
    const JENIS_PERUSAHAAN_LAINNYA                 = 'LAINNYA';
    const JENIS_PERUSAHAAN_AHLI                     = 'DATA TENAGA AHLI';
    const JENIS_PERUSAHAAN_KLASIFIKASI             = 'PERUSAHAAN KLASIFIKASI';
    const JENIS_PERUSAHAAN_COMMODITY             = 'PERUSAHAAN COMMODITY';
    const JENIS_PERUSAHAAN_PEMILIK                 = 'PERUSAHAAN PEMILIK';
    const JENIS_PERUSAHAAN_PENGURUS                 = 'PERUSAHAAN DIREKSI';
    const JENIS_PERUSAHAAN_PENGALAMAN            = 'PENGALAMAN PERUSAHAAN';
    const JENIS_PERUSAHAAN_PERALATAN            = 'PERALATAN PERUSAHAAN';
    const JENIS_PERUSAHAAN_SERTIFIKASI            = 'PERUSAHAAN SERTIFIKASI';
    const JENIS_PERUSAHAAN_REKENING                = 'PERUSAHAAN REKENING';
    const JENIS_PERUSAHAAN_DOMISILI                = 'PERUSAHAAN DOMISILI';
    const JENIS_PERUSAHAAN_PROFIL                = 'PERUSAHAAN PROFIL';
    const JENIS_PERUSAHAAN_STRUKTUR                = 'PERUSAHAAN STRUKTUR';
    const JENIS_PERUSAHAAN_FILE_LAIN            = 'PERUSAHAAN FILE LAIN';
    const JENIS_PERUSAHAAN_SALES                = 'PERUSAHAAN SALES';

    //catalog
    const JENIS_IMAGE_CATALOG    = 'image_catalog';
    const JENIS_POSTING_CATALOG    = 'image_catalog_posting';
    const JENIS_FILE_CATALOG    = 'file_lainnya_catalog';

    const STATE_NEW     = 0;
    const STATE_APPROVE = 1;
    const STATE_REPLACE = -1;
    const REF_NAME_BERITA_ACARA     = 'berita_acara';
}
