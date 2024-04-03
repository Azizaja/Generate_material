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
                {{-- form --}}
                <form class="form-horizontal" action="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="no-pengadaan" class="col-sm-2 col-form-label">Nomor Pengadaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-50" id="no-pengadaan" value="{{ $detail_pekerjaan->kode ?? '' }}"
                                    name="no-pengadaan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-50" id="nama-pengadaan"
                                    name="nama-pengadaan" value="{{ $detail_pekerjaan->nama ?? 'N/A' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="requester" class="col-sm-2 col-form-label">Requester</label>
                            <div class="col-sm-10">
                                <select class="form-select w-50" id="requester">
                                    <option selected="selected">Pilih Requester</option>
                                    {{-- <option value="">{{ $detail_pekerjaan->created_by }}</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cc-email" class="col-sm-2 col-form-label">CC Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control w-50" id="cc-email" name="cc-email"
                                    placeholder="masukan CC">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <table class="table table-bordered">
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
                                @forelse ($detail_pekerjaan->pekerjaanRincian as $rincianP)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rincianP->maxPr->pr_no ?? '' }}</td>
                                        <td>{{ $rincianP->maxPr->pr_line ?? '' }}</td>
                                        <td>{{ $rincianP->maxPr->itemnum ?? '' }}</td>
                                        <td>{{ $rincianP->nama }}</td>
                                        <td>{{ $rincianP->volume }}</td>
                                        <td>{{ $rincianP->satuan }}</td>
                                        <td>
                                            <textarea type="text" class="form-control" placeholder="Catatan Perubahan"
                                                name="catatan-perubahan" rows="1"></textarea>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse

                                {{-- <tr>
                                    <td>1</td>
                                    <td>PR-1234</td>
                                    <td>1</td>
                                    <td>123456</td>
                                    <td>Bahan Baku 1</td>
                                    <td>100</td>
                                    <td>Kg</td>
                                    <td>
                                        <textarea type="text" class="form-control" placeholder="Catatan Perubahan" name="catatan-perubahan"></textarea>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
