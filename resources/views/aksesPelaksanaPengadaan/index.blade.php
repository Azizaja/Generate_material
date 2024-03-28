@extends('layouts.app')
@section('title', 'Setting Akses Pelaksana Pengadaan')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Pengaturan Akses Pelaksana Pengadaaan</b></h5>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-50" id="nama-pengadaan"
                                            name="nama-pengadaan" value="Pengadaan Bahan Baku" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga-satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-50" id="harga-satuan" value="Rp. 200.000"
                                            name="harga-satuan" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <form class="form-horizontal" action="">
                            <input type="hidden" name="id_pengadaan" value="1"> {{-- id pengadaan value--}}
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>NO</th>
                                            <th>TAHAP</th>
                                            <th>SETTING</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Register</td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>AKSES</th>
                                                            <th>NAMA PANITIA</th>
                                                            <th>JABATAN</th>
                                                            <th>URUTAN APPROVE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-select" id="akses-anggota">
                                                                    <option value="1">akses</option>
                                                                    <option value="2">approved</option>
                                                                </select>
                                                            </td>
                                                            <td>GM Logistik</td>
                                                            <td>General Manager</td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    id="urutan-approve" name="urutan-approve"
                                                                    value="1">
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Verifikasi</td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>AKSES</th>
                                                            <th>NAMA PANITIA</th>
                                                            <th>JABATAN</th>
                                                            <th>URUTAN APPROVE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-select" id="akses-anggota">
                                                                    <option value="1">akses</option>
                                                                    <option value="2">approved</option>
                                                                </select>
                                                            </td>
                                                            <td>GM Logistik</td>
                                                            <td>General Manager</td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    id="urutan-approve" name="urutan-approve"
                                                                    value="1">
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{-- kembali ke detail persiapan pengadaan --}}
                                <button type="submit" class="btn btn-danger">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
