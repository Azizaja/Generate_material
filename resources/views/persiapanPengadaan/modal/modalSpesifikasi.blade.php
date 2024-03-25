{{-- Modal Spesifikasi --}}
@foreach ($detail_pekerjaan->pekerjaanRincian as $pekerjaanRincian)
    <div class="modal fade" id="modal-spesifikasi-{{ $pekerjaanRincian->id }}">
        {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Spesifikasi Pengadaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>SPESIFIKASI</th>
                                    <th>BOBOT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="spesifikasi">
                                @if ($pekerjaanRincian->pekerjaanRincianSpec->count() <= 1)
                                    @foreach ($pekerjaanRincian->pekerjaanRincianSpec as $pekerjaanRincianSpec)
                                        <tr>
                                            <td>
                                                <input type="text" name="spek[]" class="form-control"
                                                    placeholder="Spesifikasi"
                                                    value="{{ $pekerjaanRincianSpec->deskripsi }}">
                                            </td>
                                            <td>
                                                <input type="text" name="bobot[]" class="form-control"
                                                    placeholder="Bobot" value="{{ $pekerjaanRincianSpec->bobot }}">
                                            </td>
                                            <td>
                                                <button id="tambah-baris" type="button"
                                                    onclick="tambahBarisSpesifikasi()" class="btn btn-primary btn-xs">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
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
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
