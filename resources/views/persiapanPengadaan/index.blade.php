@extends('layouts.app')
@extends('persiapanPengadaan.modalPelaksana')

@section('title', 'Persiapan Pengadaan')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card card-tabs mb-0">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#daftar-persiapan-pengadaan" role="tab" aria-controls="daftar-persiapan-pengadaan"
                                        aria-selected="true">Daftar Persiapan Pengadaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#detail-persiapan-pengadaan" role="tab"
                                        aria-controls="detail-persiapan-pengadaan" aria-selected="false">Detail Persiapan Pengadaan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="daftar-persiapan-pengadaan" role="tabpanel"
                                    aria-labelledby="daftar-persiapan-pengadaan-tab">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <a href="" class="btn btn-primary mb-2">
                                                            <i class="fas fa-plus-circle"></i> RFQ
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table responsive">
                                                <table id="example2" class="table table-bordered table-hover mb-2">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Status</th>
                                                            <th>Dibuat</th>
                                                            <th>Tim Panitia</th>
                                                            {{-- <th>Aksi</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <a href="">
                                                                    <i  class="fas fa-search"></i> RFQ-20210101X
                                                                </a>
                                                            </td>
                                                            <td>RFQ Pengadaan ATK</td>
                                                            <td>
                                                                <span class="badge badge-warning">Persiapan Pengadaan</span>
                                                                <span class="badge badge-success">Pengadaan Selesai</span>
                                                                <span class="badge badge-danger">Pengadaan Dibatalkan</span>
                                                            </td>
                                                            <td>2021-01-01</td>
                                                            <td>
                                                                <a data-toggle="modal" href="#modal-pelaksana-kegiatan">
                                                                    <i  class="fas fa-search"></i> Pelaksana Pengadaan
                                                                </a>
                                                             </td>
                                                            {{-- <td>
                                                                <a href="" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-eye"></i> Detail
                                                                </a>
                                                            </td> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="detail-persiapan-pengadaan" role="tabpanel"
                                    aria-labelledby="detail-persiapan-pengadaan-tab">
                                    <div class="row p-3">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <table class="align-top">
                                                    <tr>
                                                        <td style="width: 40%;"><b>No Pengadaaan</b></td>
                                                        <td style="width:10%">:</td>
                                                        <td style="width: 50%"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Pengadaan</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Di Buat Oleh</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Unit kerja</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bidang/Sub Bidang</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>HPS</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>PR Number</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <table class="align-top">
                                                    <tr>
                                                        <td style="width: 40%;"><b>Metode</b></td>
                                                        <td style="width:10%">:</td>
                                                        <td style="width: 50%"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bobot</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Batas Lulus</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Group Material</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Metode Kontrak</b></td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 p-0">
                                        <div class="card card-dark card-outline card-tabs mb-0">
                                            <div class="card-header p-0">
                                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                            href="#rincian-item" role="tab" aria-controls="rincian-item"
                                                            aria-selected="true">Rincian Item</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                            href="#persyaratan-pengadaan" role="tab" aria-controls="persyaratan-pengadaan"
                                                            aria-selected="true">Persyaratan Pengadaan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                            href="#pelaksana-pengadaan" role="tab"
                                                            aria-controls="pelaksana-pengadaan" aria-selected="false">Pelaksana Pengadaan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                            href="#perusahaan-diundang" role="tab"
                                                            aria-controls="perusahaan-diundang" aria-selected="false">Perusahaan Diundang</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                            href="#activity-log" role="tab"
                                                            aria-controls="activity-log" aria-selected="false">Activity Log</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                            href="#activity-resume" role="tab"
                                                            aria-controls="activity-resume" aria-selected="false">Activity Resume</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                                    <div class="tab-pane fade show active p-3" id="rincian-item" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-home-tab">
                                                     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis ea culpa atque! Quisquam
                                                        quidem, quod, voluptates, vero quae quibusdam nemo quia voluptatem tempora est
                                                        necessitatibus? Quisquam, quod. Quisquam, quod.
                                                    </div>
                                                    <div class="tab-pane fade" id="persyaratan-pengadaan" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-home-tab">
                                                        {{-- tab --}}
                                                        <div class="card card-dark card-outline card-tabs">
                                                            <div class="card-header">
                                                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                                            href="#kualifikasi" role="tab" aria-controls="rincian-item"
                                                                            aria-selected="true">Kualifikasi</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                                            href="#administrasi" role="tab" aria-controls="persyaratan-pengadaan"
                                                                            aria-selected="true">Administrasi</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                                            href="#teknis" role="tab"
                                                                            aria-controls="pelaksana-pengadaan" aria-selected="false">Teknis</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                                            href="#kewajaran-harga" role="tab"
                                                                            aria-controls="perusahaan-diundang" aria-selected="false">Kewajaran Harga</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade p-3" id="pelaksana-pengadaan" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-profile-tab">
                                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus
                                                        ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                                                    </div>
                                                    <div class="tab-pane fade p-3" id="perusahaan-diundang" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-profile-tab">
                                                        www
                                                    </div>
                                                    <div class="tab-pane fade p-3" id="activity-log" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-profile-tab">
                                                       yyy
                                                    </div>
                                                    <div class="tab-pane fade p-3" id="activity-resume" role="tabpanel"
                                                        aria-labelledby="custom-tabs-one-profile-tab">
                                                        ddd
                                                    </div>
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal pelaksana kegiatan --}}
    

@endsection
