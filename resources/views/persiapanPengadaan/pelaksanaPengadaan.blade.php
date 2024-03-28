<div class="row">
    <h5 class="fw-bold">Pelaksana Pengadaan</h5>
    <form action="">
        @csrf
        <div class="form-group row">
            <label for="nama-pelaksana" class="col-sm-2 form-label">Nama Tim</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="nama-pelaksana"
                    value="{{ $detail_pekerjaan->pekerjaanPanitia->first()->kelompokPanitia->nama }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="tambah-anggota" class="col-sm-2 col-form-label">Tambah Anggota</label>
            <div class="col-sm-10">
                @php
                    $daftarAnggotaPanitia = App\Models\ApplicationUser::doSelectPanitiaByInstansiSatuanKerjaAsNestedArray(
                        1,
                    );
                @endphp
                <select class="form-select" id="tambah-anggota">
                    @foreach ($daftarAnggotaPanitia as $group => $options)
                        <optgroup label="{{ $group }}">
                            @foreach ($options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-md mb-2">Tambahkan</button>
            <a href="{{ route('akses-pelaksana-pengadaan.show', ['id' => $detail_pekerjaan->id]) }}"
                class="btn btn-primary btn-md mb-2">Akses Pelaksana
                Pengadaan</a>
        </div>
    </form>
    <div class="col-12">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>JABATAN</th>
                    <th>NAMA</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $noAnggota = 1;
                @endphp
                @foreach ($detail_pekerjaan->pekerjaanPanitia as $pekerjaanPanitia)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($pekerjaanPanitia->jabatan == 1)
                                Ketua
                            @else
                                Anggota {{ $noAnggota++ }}
                            @endif
                        </td>
                        <td>{{ $pekerjaanPanitia->applicationUser->nama }}</td>
                        <td>{{ PekerjaanPanitiaHelper::getKeteranganString($pekerjaanPanitia->id) }}</td>
                        <td>
                            @if ($detail_pekerjaan->isAllowedDelete())
                                @if ($pekerjaanPanitia->jabatan != 1)
                                    <a href="" data-toggle="modal" class="btn btn-danger btn-md">hapus</a>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
