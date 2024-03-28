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
                                            name="nama-pengadaan" value="{{ $detail_pekerjaan->nama }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga-satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-50" id="harga-satuan"
                                            value="{{ PekerjaanHelper::getStringHPS($detail_pekerjaan->id) }}"
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
                                        @foreach ($daftarAksesPanitas as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value }}</td>
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
                                                            @php
                                                                $noAnggota = 1;
                                                            @endphp
                                                            @foreach ($detail_pekerjaan->pekerjaanPanitia as $pekerjaanPanitia)
                                                                @php
                                                                    $kodeAkses = PekerjaanPanitiaAksesHelper::getValueAkses(
                                                                        $key,
                                                                        $pekerjaanPanitia->id,
                                                                    );
                                                                    $pekerjaan_panitia_approve = PekerjaanPanitiaAksesHelper::getPanitiaApproveByPekerjaanPanitia(
                                                                        $key,
                                                                        $pekerjaanPanitia->id,
                                                                    );
                                                                    if ($pekerjaan_panitia_approve) {
                                                                        $pekerjaan_panitia_approve =
                                                                            $pekerjaan_panitia_approve->sequence;
                                                                    } else {
                                                                        $pekerjaan_panitia_approve = null;
                                                                    }

                                                                    Debugbar::info($pekerjaan_panitia_approve);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        <select class="form-select" id="akses-anggota">
                                                                            <option value="0"
                                                                                @if ($kodeAkses == null) selected @endif>
                                                                                Pilih Akses</option>
                                                                            <option value="1"
                                                                                @if ($kodeAkses == 1) selected @endif>
                                                                                Akses</option>
                                                                            <option value="2"
                                                                                @if ($kodeAkses == 2) selected @endif>
                                                                                Approved</option>
                                                                            <option value="3"
                                                                                @if ($kodeAkses == 3) selected @endif>
                                                                                Read only</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>{{ $pekerjaanPanitia->applicationUser->nama }}</td>
                                                                    <td>
                                                                        @if ($pekerjaanPanitia->jabatan == 1)
                                                                            Ketua
                                                                        @else
                                                                            Anggota {{ $noAnggota++ }}
                                                                        @endif /
                                                                        {{ PekerjaanPanitiaHelper::getKeteranganString($pekerjaanPanitia->id) }}
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            id="urutan-approve" name="urutan-approve"
                                                                            @if ($pekerjaan_panitia_approve == '1') value="1"
                                                                            @else
                                                                            disabled value="" @endif
                                                                            min="1">

                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
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
