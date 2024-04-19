{{-- modal HPS --}}
@foreach ($detail_pekerjaan->pekerjaanRincian as $pekerjaanRincian)
    <div class="modal fade" id="modal-hps-{{ $pekerjaanRincian->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">HPS Pengadaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama-item" class="col-sm-2 col-form-label">Nama Item</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="nama-item" value="Bahan Baku"
                                        name="nama-item" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="satuan-item" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="satuan-item" name="satuan-item"
                                        value="Pengadaan Bahan Baku" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah-item" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="jumlah-item" value="Rp. 200.000"
                                        name="jumlah-item" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="HPS-satuan" class="col-sm-2 col-form-label">HPS Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50"
                                        id="hps-satuan-{{ $pekerjaanRincian->id }}" name="HPS-satuan"
                                        placeholder="masukan HPS satuan">
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Pilih</th>
                                        <th>PR NUMBER</th>
                                        <th>NAMA</th>
                                        <th>HARGA SATUAN</th>
                                        <th>TGL DIBUAT</th>
                                        <th>VENDOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (PekerjaanHelper::getHpsRincian($pekerjaanRincian->nama) as $detailPekerjaanRincian)
                                        <tr>
                                            <td>
                                                <input type="radio" name="pilihan-hps"
                                                    onclick="setHpsSatuan({{ $pekerjaanRincian->id }}, {{ $detailPekerjaanRincian->id }})">
                                            </td>
                                            <td>{{ $detailPekerjaanRincian->pengadaanRincian->pekerjaanRincian->maxPr->pr_no ?? '' }}
                                            </td>
                                            <td>{{ $detailPekerjaanRincian->nama }}</td>
                                            <td id="harga-satuan-{{ $detailPekerjaanRincian->id }}">
                                                {{ 'Rp. ' . number_format($detailPekerjaanRincian->harga_satuan_negosiasi, 2, ',', '.') }}
                                            </td>
                                            <td>{{ $detailPekerjaanRincian->created_at }}</td>
                                            {{-- <td>{{ $detailPekerjaanRincian->penawaran->perusahaan->nama }}</td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
