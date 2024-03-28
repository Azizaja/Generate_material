@extends('layouts.app')
@section('title', 'Undangan Penyedia Pengadaan')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Undangan Untuk Penyedia</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="no-pekerjaan" class="col-sm-2 col-form-label">No Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="no-pekerjaan" value="Rp. 200.000"
                                        name="no-pekerjaan" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="nama-pengadaan"
                                        name="nama-pengadaan" value="Pengadaan Bahan Baku" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal-rencana" class="col-sm-2 col-form-label">Tanggal Rencana Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="tanggal-rencana"
                                        name="tanggal-rencana" value="25-9-2022" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hps" class="col-sm-2 col-form-label">HPS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="hps"
                                        name="hps" value="Rp. 200.000.000" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bidang-sub-bidang" class="col-sm-2 col-form-label">Bidang/Sub Bidang</label>
                                <div class="col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-2">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Bidang</th>
                                                    <th>Sub Bidang</th>
                                                    <th>Kualifikasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($detail_pekerjaan->bidang as $bidangs)
                                                    @foreach ($bidangs->subBidang as $subBidang)
                                                        <tr>
                                                            <td>[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</td>
                                                            <td>[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]</td>
                                                            <td class="text-center">
                                                                {{ $subBidang->kualifikasiGroupDetail->nama ?? '-' }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach --}}
                                                
                                                <tr>
                                                    <td>[2817] - [INDUSTRI MESIN DAN PERALATAN KANTOR (BUKAN KOMPUTER DAN PERALATAN PERLENGKAPANNYA)]</td>
                                                    <td>[28172] - [INDUSTRI MESIN KANTOR DAN AKUNTANSI ELEKTRIK]</td>
                                                    <td>Non Kecil</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="material" class="col-sm-2 col-form-label">Group Material</label>
                                <div class="col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-2">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Material</th>
                                                    <th>Group Material</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($detail_pekerjaan->pekerjaanSubCommodity as $pekerjaanSubCommodity)
                                                    <tr>
                                                        <td>{{ $pekerjaanSubCommodity->mSubCommodity->kode }} -
                                                            {{ $pekerjaanSubCommodity->mSubCommodity->nama }}</td>
                                                        <td>{{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->kode }} -
                                                            {{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->nama }}</td>
                                                    </tr>
                                                @endforeach --}}

                                                <tr>
                                                    <td>C0003 - COMPUTER PERIPHERAL 1</td>
                                                    <td>C0003 - COMPUTER PERIPHERAL 1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bidang-sub-bidang" class="col-sm-2 col-form-label">Perusahaan yang telah diundang</label>
                                <div class="col-sm-10">
                                    <div class="table responsive">
                                        <table id="datatable1" class="table table-bordered table-hover mb-2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NPWP</th>
                                                    <th>PERUSAHAAN</th>
                                                    <th>DRI</th>
                                                    <th>SATUAN KERJA</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>1234567890</td>
                                                    <td>PT. ABC</td>
                                                    <td>1234567890</td>
                                                    <td>PT. ABC</td>
                                                    <td>PT. ABC</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Ubah</a>
                                                        <a href="#" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="#" class="btn btn-danger">Hapus Semua Perusahaan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Detail Perusahaan Yang Akan Diundang </b></h5>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="">
                                @csrf
                                <div class="table-responsive">
                                    <table id="datatable2" class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">
                                                    <span>Pilih Semua</span>
                                                    <input type="checkbox" name="check-all" id="check-all">
                                                </th>
                                                <th>PERUSAHAAN</th>
                                                <th>SUB BIDANG & KUALIFIKASI</th>
                                                <th>MATERIAL & SUB MATERIAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="check-all" id="check-all">
                                                </td>
                                                <td>
                                                        <table class="align-top table">
                                                            <tr>
                                                                <td width="25%"><b>Nama</b></td>
                                                                <td>&nbsp BMI</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Rating Div Logistik</b></td>
                                                                <td>
                                                                    <span class="fa fa-star"></span><span class="fa fa-star">
                                                                    </span><span class="fa fa-star"></span><span class="fa fa-star">
                                                                    </span><span class="fa fa-star"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Rating Div GA</b></td>
                                                                <td>
                                                                </span><span class="fa fa-star"></span><span class="fa fa-star">
                                                                </span><span class="fa fa-star"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Alamat</b></td>
                                                                <td>&nbsp -</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Kota</b></td>
                                                                <td>
                                                                    &nbsp -
                                                                </td>
                                                            </tr>
                                                        </table>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>contoh</li>
                                                        <li>contoh</li>
                                                        <li>contoh</li>
                                                    </ul>
                                                </td>
                                                <td>                                                    
                                                    <ul>
                                                        <li>contoh</li>
                                                        <li>contoh</li>
                                                        <li>contoh</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="card-footer"> --}}
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        new DataTable('#datatable1', {
            "autoWidth": false,
        });
        new DataTable('#datatable2', {
            "autoWidth": false,
        });

        //check all
        $('#check-all').click(function () {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endpush
