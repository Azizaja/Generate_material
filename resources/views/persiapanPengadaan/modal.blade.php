{{-- modal pelaksana kegiatan --}}
@foreach ($pekerjaans as $pekerjaan)
    <div class="modal fade" id="modal-pelaksana-kegiatan-{{ $pekerjaan->id }}">
        {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Pelaksana Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="align-top">
                        @foreach ($pekerjaan->pekerjaanPanitia as $panitia)
                            <tr>
                                <td><b>{{ $loop->iteration }}. </b></td>
                                <td><b>{{ $panitia->applicationUser->nama }}</b></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>
@endforeach

{{-- modal usulan perubahan --}}
<div class="modal fade" id="usulan-perubahan">
    {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    <div class="modal-dialog modal-xl" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Usulan Perubahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <table class="align-top  w-100">
                            <tr>
                                <td class="w-25"><b>No Pengadaaan</b></td>
                                <td style="width: 2%">:</td>
                                <td>12RRIO90</td>
                            </tr>
                            <tr>
                                <td><b>Nama Pengadaan</b></td>
                                <td>:</td>
                                <td>Pengadaan Bahan Baku</td>
                            </tr>
                            <tr>
                                <td><b>Requester</b></td>
                                <td>:</td>
                                <td>
                                    <select class="form-control">
                                        <option selected="selected">Pilih Requester</option>
                                        <option>Logistik</option>
                                        <option>Produksi</option>
                                        <option>Quality Control</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>CC</b></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="CC">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>PR NUMBER</th>
                                    <th>LINE</th>
                                    <th>ITEMNUM</th>
                                    <th>NAMA</th>
                                    <th>VOLUME</th>
                                    <th>SATUAN</th>
                                    <th>CATATAN PERUBAHAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PR-1234</td>
                                    <td>1</td>
                                    <td>123456</td>
                                    <td>Bahan Baku 1</td>
                                    <td>100</td>
                                    <td>Kg</td>
                                    <td>
                                        <textarea type="text" class="form-control" placeholder="Catatan Perubahan"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>PR-1234</td>
                                    <td>2</td>
                                    <td>123457</td>
                                    <td>Bahan Baku 2</td>
                                    <td>200</td>
                                    <td>Kg</td>
                                    <td>
                                        <textarea type="text" class="form-control" placeholder="Catatan Perubahan"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-primary">Usulkan Perubahan</a>
            </div>
            {{-- <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-primary">Usulkan Perubahan</a>
            </div> --}}
        </div>
    </div>
</div>

{{-- modal HPS --}}
<div class="modal fade" id="modal-hps">
    {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HPS Pengadaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3">
                        <table class="align-top w-100">
                            <tr>
                                <td class="w-25"><b>Nama</b></td>
                                <td style="width: 2%">:</td>
                                <td>12RRIO90</td>
                            </tr>
                            <tr>
                                <td><b>Satuan</b></td>
                                <td>:</td>
                                <td>Kg</td>
                            </tr>
                            <tr>
                                <td><b>Jumlah</b></td>
                                <td>:</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td><b>HPS Satuan</b></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" placeholder="HPS Satuan">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>PR NUMBER</th>
                                    <th>NAMA</th>
                                    <th>HARGA SATUAN</th>
                                    <th>TGL DIBUAT</th>
                                    <th>VENDOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PR-1234</td>
                                    <td>Bahan Baku 1</td>
                                    <td>Rp. 200.000</td>
                                    <td>22-3-2023</td>
                                    <td>PT Maju Berkah</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>

{{-- Modal Spesifikasi --}}
<div class="modal fade" id="modal-spesifikasi">
    {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Spesifikasi Pengadaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>SPESIFIKASI</th>
                                    <th>BOBOT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="spesifikasi">
                                <tr>
                                    <td>
                                        <input type="text" name="spek[]" class="form-control"
                                            placeholder="Spesifikasi">
                                    </td>
                                    <td>
                                        <input type="text" name="bobot[]" class="form-control"
                                            placeholder="Bobot">
                                    </td>
                                    <td>
                                        <button id="tambah-baris" type="button" onclick="tambahBarisSpesifikasi()"
                                            class="btn btn-primary btn-xs">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>
