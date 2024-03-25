@extends('layouts.app')
@section('title', 'Setting Persiapan Pengadaan')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Pengaturan Metode Pengadaaan</b></h5>
                        </div>
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="no-pengadaan" class="col-sm-2 col-form-label">No Pengadaaan</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control w-75" id="no-pengadaan" value="12RRIO90" name="no-pengadaan"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control w-75" id="nama-pengadaan" name="nama-pengadaan"
                                                placeholder="Masukan Nama Pengadaan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hps" class="col-sm-2 col-form-label">Nilai HPS</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control w-75" id="hps" name="hps"
                                                value="Rp. 1.000.000,00" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mata-uang" class="col-sm-2 col-form-label">Mata Uang</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="mata uang">
                                                <option selected="selected">Pilih Mata Uang</option>
                                                <option value="1">Dolar</option>
                                                <option>IDR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun-anggaran" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="tahun-anggaran">
                                                <option selected="selected">Pilih Tahun Anggaran</option>
                                                <option value="1">2024</option>
                                                <option>2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="klasifikasi">
                                                <option selected="selected">Pilih Klasifikasi</option>
                                                <option value="1">Pengadaan Barang</option>
                                                <option>Jasa Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="metode-pengadaan" class="col-sm-2 col-form-label">Metode pengadaan</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="metode-pengadaan">
                                                <option selected="selected">Pilih Metode Pengadaaan</option>
                                                <option value="1">Pengadaan terbuka</option>
                                                <option>Pengadaan tertutup</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis-kontrak" class="col-sm-2 col-form-label">Jenis Kontrak</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="jenis-kontrak">
                                                <option selected="selected">Pilih Jenis Kontrak</option>
                                                <option value="1">Pengadaan terbuka</option>
                                                <option>Pengadaan tertutup</option>
                                            </select>
                                        </div>
                                    </div>                                  
                                    <div class="form-group row">
                                        <label for="requester" class="col-sm-2 col-form-label">Requester</label>
                                        <div class="col-sm-10">
                                            <select class="form-select w-75" name="requester">
                                                <option selected="selected">Pilih Requester</option>
                                                <option value="1">Purchaser 1</option>
                                                <option>Purchaser 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status-multi-pemenang" class="col-sm-2 col-form-label">Status Multi Pemenang</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Gunakan Status Multi Pemenang</label>
                                            </div>
                                        </div>
                                    </div>                                      
                                    <div class="form-group row">
                                        <label for="bidang" class="col-sm-2 col-form-label">Bidang/Sub Bidang</label>
                                        <div class="col-sm-10">
                                            <a href="#modal-bidang-material" class="btn btn-info btn-sm" data-toggle="modal">Tambah Bidang/Sub Bidang</a>
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered w-75">
                                                    <thead>
                                                        <tr>
                                                            <th>Bidang</th>
                                                            <th>Sub Bidang</th>
                                                            <th>Kualifikasi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Logistik dan perencanaan gudang pengendalian
                                                                komoditas</td>
                                                            <td>Logistik aktivitas jasa pelayanan informasi
                                                                gudang logistik</td>
                                                            <td>Logistik aktivitas jasa pelayanan informasi
                                                                gudang logistik</td>
                                                            <td>
                                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="material" class="col-sm-2 col-form-label">Material</label>
                                        <div class="col-sm-10">
                                            <a href="#modal-material" class="btn btn-info btn-sm" data-toggle="modal">Tambah Material</a>
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered w-75">
                                                    <thead>
                                                        <tr>
                                                            <th>Material</th>
                                                            <th>Group Material</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Logistik dan perencanaan gudang pengendalian
                                                                komoditas</td>
                                                            <td>Logistik aktivitas jasa pelayanan informasi
                                                                gudang logistik</td>
                                                            <td>
                                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card-footer"> --}}
                                        {{-- kembali ke detail persiapan pengadaan --}}
                                        <button type="submit" class="btn btn-danger">Batal</button> 
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    {{-- </div> --}}
                                </div>
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal. --}}
    @include('settingPersiapanPengadaan.modal')
@endsection
