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
                                    <input type="text" class="form-control w-50" id="no-pekerjaan"
                                        value="{{ $detail_pekerjaan->kode }} {{ $detail_pekerjaan->status_multi_pemenang == 1 ? ' (Multi Pemenang)' : '' }}"
                                        name="no-pekerjaan" disabled>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="nama-pengadaan"
                                        name="nama-pengadaan" value="{{ $detail_pekerjaan->nama }}" disabled>
                                </div>
                            </div>
                            @php
                                use Carbon\Carbon;

                                setlocale(LC_TIME, 'id_ID');

                                $tanggal_rencana_pengadaan_raw = $detail_pekerjaan->tanggal_rencana_pengadaan;

                                $tanggal_rencana_pengadaan = Carbon::parse(
                                    $tanggal_rencana_pengadaan_raw,
                                )->translatedFormat('d F Y');
                            @endphp
                            <div class="form-group row">
                                <label for="tanggal-rencana" class="col-sm-2 col-form-label">Tanggal Rencana
                                    Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="tanggal-rencana"
                                        name="tanggal-rencana" value="{{ $tanggal_rencana_pengadaan }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hps" class="col-sm-2 col-form-label">HPS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50" id="hps" name="hps"
                                        value="Rp. 200.000.000" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bidang-sub-bidang" class="col-sm-2 col-form-label">Bidang/Sub Bidang</label>
                                <div class="col-sm-10 p-0">
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
                                                @forelse ($detail_pekerjaan->bidang as $bidangs)
                                                    @foreach ($bidangs->subBidang as $subBidang)
                                                        <tr>
                                                            <td>[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</td>
                                                            <td>[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]</td>
                                                            <td class="text-center">
                                                                {{ $subBidang->kualifikasiGroupDetail->nama ?? '-' }}</td>
                                                        </tr>
                                                    @endforeach
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">Tidak Ada Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="material" class="col-sm-2 col-form-label">Group Material</label>
                                <div class="col-sm-10 p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-2">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Material</th>
                                                    <th>Group Material</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($detail_pekerjaan->pekerjaanSubCommodity as $pekerjaanSubCommodity)
                                                    <tr>
                                                        <td>{{ $pekerjaanSubCommodity->mSubCommodity->kode }} -
                                                            {{ $pekerjaanSubCommodity->mSubCommodity->nama }}
                                                        </td>
                                                        <td>{{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->kode }} -
                                                            {{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->nama }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">Tidak Ada Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bidang-sub-bidang" class="col-sm-2 col-form-label">Perusahaan yang telah
                                    diundang</label>
                                <div class="col-sm-10 p-0">
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
                                                @foreach ($detail_pekerjaan->perusahaanDiundang as $perusahaanDiundang)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ DataFormatterHelper::formatNpwp($perusahaanDiundang->perusahaan->npwp) }}
                                                        </td>
                                                        <td>
                                                            @if ($perusahaanDiundang->state == null)
                                                                {{ $perusahaanDiundang->perusahaan->nama }}
                                                                @php
                                                                    $string_status = '';
                                                                @endphp
                                                            @endif
                                                            @if ($perusahaanDiundang->state == App\Models\Pekerjaan::STATUS_PERUSAHAAN_TIDAK_SESUAI_SPEC)
                                                                <p class="text-danger">
                                                                    {{ $perusahaanDiundang->perusahaan->nama }}</p>
                                                                @php
                                                                    $string_status = 'Tidak sesuai spesifikasi';
                                                                @endphp
                                                            @endif
                                                            @if ($perusahaanDiundang->state == App\Models\Pekerjaan::STATUS_PERUSAHAAN_SESUAI_SPEC)
                                                                <p>{{ $perusahaanDiundang->perusahaan->nama }}</p>
                                                                @php
                                                                    $string_status = 'Sesuai Spesifikasi';
                                                                @endphp
                                                            @endif
                                                        </td>
                                                        @php
                                                            $perusahaan = new App\Models\Perusahaan();
                                                            $statusDrt = $perusahaan->getStatusDrt();
                                                        @endphp
                                                        <td>{{ $perusahaanDiundang->perusahaan->dpp_nomor }}
                                                            {!! $statusDrt !!}
                                                        </td>
                                                        <td>{{ $perusahaanDiundang->perusahaan->satuanKerja->nama ?? '-' }}
                                                        </td>
                                                        <td>
                                                            <p><b>Status : </b>{{ $string_status }}</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                                                    </path>
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z">
                                                                    </path>
                                                                </svg>
                                                                Ubah
                                                            </button>
                                                            <button type="button" class="btn btn-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                                                    </path>
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
                                            @forelse ($penyedias as $penyedia)
                                                @if ($penyedia->id != $detail_pekerjaan->perusahaanDiundang->pluck('perusahaan_id')->contains($penyedia->id))
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="check-all" id="check-all">
                                                        </td>
                                                        <td>
                                                            <table class="align-top table">
                                                                <tr>
                                                                    <td width="25%"><b>Nama</b></td>
                                                                    <td>{{ $penyedia->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Rating Div Logistik</b></td>
                                                                    <td>
                                                                        {!! $penyedia->getStar('Logistik') !!}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Rating Div GA</b></td>
                                                                    <td>
                                                                        {!! $penyedia->getStar('GA') !!}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Alamat</b></td>
                                                                    <td>{{ $penyedia->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Kota</b></td>
                                                                    <td>
                                                                        &nbsp{{ $penyedia->kota_id ? $penyedia->mKota->nama_kota . ', ' . $penyedia->mKota->mPropinsi->nama_propinsi . ', ' . $penyedia->mKota->mPropinsi->mNegara->nama_negara : '-' }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($penyedia->perusahaanSpesifikasi as $perusahaanSpesifikasi)
                                                                    @php
                                                                        $pekerjaan_sub_bidang = App\Models\PekerjaanSubBidang::where(
                                                                            'pekerjaan_id',
                                                                            $detail_pekerjaan->id,
                                                                        )
                                                                            ->where(
                                                                                'sub_bidang_id',
                                                                                $perusahaanSpesifikasi->sub_bidang_id,
                                                                            )
                                                                            ->get();
                                                                    @endphp
                                                                    <li>
                                                                        {{-- {{ Barryvdh\Debugbar\Facades\DebugBar::info(
                                                                            'psb : ' . $pekerjaan_sub_bidang,
                                                                            $detail_pekerjaan->pekerjaanSubBidang->pluck('sub_bidang_id')->contains($perusahaanSpesifikasi->sub_bidang_id),
                                                                        ) }} --}}


                                                                        @if ($detail_pekerjaan->pekerjaanSubBidang->pluck('sub_bidang_id')->contains($perusahaanSpesifikasi->sub_bidang_id))
                                                                            {!! '<b>' . $perusahaanSpesifikasi->subBidang->nama . '</b>' !!}
                                                                        @else
                                                                            {{ $perusahaanSpesifikasi->subBidang->nama }}
                                                                        @endif
                                                                        {{ ' [' }}
                                                                        @if ($pekerjaan_sub_bidang->isNotEmpty())
                                                                            @if ($perusahaanSpesifikasi->kualifikasi_group_detail_id >= $pekerjaan_sub_bidang->kualifikasi_group_detail_id)
                                                                                {!! '<b>' . $perusahaanSpesifikasi->kualifikasiGroupDetail->nama . '</b>' . ']' !!}
                                                                            @else
                                                                                {{ $perusahaanSpesifikasi->kualifikasiGroupDetail->nama . ']' }}
                                                                            @endif
                                                                        @else
                                                                            {{ (optional($perusahaanSpesifikasi->kualifikasiGroupDetail)->nama ?? '') . ']' }}
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($penyedia->perusahaanCommodity as $perusahaanCommodity)
                                                                    <li>
                                                                        @if ($detail_pekerjaan->pekerjaanSubCommodity->pluck('sub_commodity_id')->contains($perusahaanCommodity->sub_commodity_id))
                                                                            {!! '<b>' .
                                                                                $perusahaanCommodity->mSubCommodity->kode .
                                                                                ' - ' .
                                                                                $perusahaanCommodity->mSubCommodity->nama .
                                                                                '</b>' !!}
                                                                        @else
                                                                            {{ $perusahaanCommodity->mSubCommodity->kode . ' - ' . $perusahaanCommodity->mSubCommodity->nama }}
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @empty
                                            @endforelse
                                            {{-- <tr>
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
                                                                </span><span class="fa fa-star"></span><span
                                                                    class="fa fa-star">
                                                                </span><span class="fa fa-star"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Rating Div GA</b></td>
                                                            <td>
                                                                </span><span class="fa fa-star"></span><span
                                                                    class="fa fa-star">
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
                                            </tr> --}}
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
        $('#check-all').click(function() {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endpush
