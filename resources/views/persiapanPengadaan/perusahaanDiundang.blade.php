<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Perusahaan Diundang</h5>
        <a href="{{ route('persiapan-pengadaan.undangan', ['id' => $detail_pekerjaan->id]) }}"
            class="btn btn-primary btn-md mb-3">
            <i class="fas fa-plus"></i> Tambah Perusahaan
        </a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>NPWP</th>
                    <th>PERUSAHAAN</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th>SATUAN KERJA</th>
                    <th>CATATAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pekerjaan->perusahaanDiundang as $perusahaanDiundang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ DataFormatterHelper::formatNpwp($perusahaanDiundang->perusahaan->npwp) }}</td>
                        <td>
                            @if ($perusahaanDiundang->state == null)
                                {{ $perusahaanDiundang->perusahaan->nama }}
                                @php
                                    $string_status = '';
                                @endphp
                            @endif
                            @if ($perusahaanDiundang->state == App\Models\Pekerjaan::STATUS_PERUSAHAAN_TIDAK_SESUAI_SPEC)
                                <p class="text-danger">{{ $perusahaanDiundang->perusahaan->nama }}</p>
                                @php
                                    $string_status = 'Tidak sesuai spesifikasi';
                                @endphp
                            @endif
                            @if ($perusahaanDiundang->state == App\Models\Pekerjaan::STATUS_PERUSAHAAN_SESUAI_SPEC)
                                <p>{{ $perusahaanDiundang->perusahaan->nama }}</p>
                                @php
                                    $string_status = '';
                                @endphp
                            @endif
                        </td>
                        <td>{{ $perusahaanDiundang->perusahaan->email }}</td>
                        <td>{{ $perusahaanDiundang->perusahaan->alamat }}</td>
                        <td>{{ $perusahaanDiundang->perusahaan->satuanKerja->nama ?? '-' }}</td>
                        <td>
                            <p>{{ $string_status }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
