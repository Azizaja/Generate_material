@php
    $mep = $detail_pekerjaan->metodePengadaan->metodeEvaluasiPenawaran->status_butuh_bobot_teknis ?? null;
@endphp

<div class="tab-pane fade show active" id="detail-persiapan-pengadaan" role="tabpanel"
    aria-labelledby="detail-persiapan-pengadaan-tab">
    <div class="row p-3">
        <div class="col-6">
            <div class="mb-3">
                <table class="align-top">
                    <tr>
                        <td><b>No Pengadaaan</b></td>
                        <td>:</td>
                        <td>&nbsp{{ $detail_pekerjaan->kode ?? '' }}</td>
                    </tr>
                    <tr>
                        <td><b>Nama Pengadaan</b></td>
                        <td>:</td>
                        <td>&nbsp{{ $detail_pekerjaan->nama ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><b>Di Buat Oleh</b></td>
                        <td>:</td>
                        <td>&nbsp{{ $detail_pekerjaan->created_by }}</td>
                    </tr>
                    <tr>
                        <td><b>Unit kerja</b></td>
                        <td>:</td>
                        <td>&nbsp{{ $detail_pekerjaan->satuanKerja->nama ?? 'N/A' }}</td>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Bidang/Sub Bidang</b></td>
                        <td>:</td>
                        <td>
                            <table class="table table-bordered table-responsive m-2">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Bidang</th>
                                        <th>Sub Bidang</th>
                                        <th>Kualifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_pekerjaan->bidang as $bidangs)
                                        @foreach ($bidangs->subBidang as $subBidang)
                                            <tr>
                                                <td>[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</td>
                                                <td>[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]</td>
                                                <td class="text-center">
                                                    {{ $subBidang->kualifikasiGroupDetail->nama ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td><b>HPS</b></td>
                        <td>:</td>
                        <td>&nbsp
                            @if ($detail_pekerjaan->currency_value == 1)
                                @php
                                    $idr_val_default = App\Models\Services\UserService::getCurrencyValue('IDR');
                                @endphp
                            @else
                                @php
                                    $idr_val_default = $detail_pekerjaan->currency_value;
                                @endphp
                            @endif
                            @if ($detail_pekerjaan->currency_id == 'IDR')
                                {{ 'Rp. ' .
                                    number_format($detail_pekerjaan->hps, 2, ',', '.') .
                                    ' / $' .
                                    number_format($detail_pekerjaan->hps / $idr_val_default, 2, ',', '.') .
                                    ' ( $1 = ' .
                                    number_format($idr_val_default, 2, ',', '.') .
                                    ' )' }}
                            @endif
                            @if ($detail_pekerjaan->currency_id == 'USD')
                                {{ 'Rp. ' .
                                    number_format($detail_pekerjaan->hps * $idr_val_default, 2, ',', '.') .
                                    ' / $' .
                                    number_format($detail_pekerjaan->hps, 2, ',', '.') .
                                    ' ( $1 = ' .
                                    number_format($idr_val_default, 2, ',', '.') .
                                    ' )' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><b>PR Number</b></td>
                        <td>:</td>
                        <td>&nbsp {{ App\Models\Pekerjaan::getPrNumberString($detail_pekerjaan->id) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <table class="align-top">
                    <tr>
                        <td><b>PR Number</b></td>
                        <td>:</td>
                        <td>PR0026TYY</td>
                    </tr>
                    <tr>
                        <td><b>Metode</b></td>
                        <td>:</td>
                        <td>&nbsp{{ $detail_pekerjaan->metodePengadaan->nama ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><b>Metode Kontrak</b></td>
                        <td>:</td>
                        <td>&nbsp{{ App\Models\Pekerjaan::getMetodeKontrak($detail_pekerjaan->metode_kontrak) }}</td>
                    </tr>
                    <tr>
                        <td><b>Batas Lulus</b></td>
                        <td>:</td>
                        <td>&nbsp
                            @if (isset($mep) && $mep == 1)
                                {{ $detail_pekerjaan->batas_lulus ?? 'N/A' }}
                            @endif
                        </td>
                    </tr>
                    @if (isset($mep) && $mep == 1 && $detail_pekerjaan->status_multi_pemenang)
                        <tr>
                            <td><b>Bobot</b></td>
                            <td>:</td>
                            <td></td>
                        <tr>
                        <tr>
                            <td><b>Bobot Teknis</b></td>
                            <td>:</td>
                            <td>{{ $detail_pekerjaan->bobot_teknis }}</td>
                        </tr>
                        <tr>
                            <td><b>Bobot Harga</b></td>
                            <td>:</td>
                            <td>{{ $detail_pekerjaan->bobot_harga }}</td>
                        </tr>
                    @else
                        <tr>
                            <td><b>Bobot</b></td>
                            <td>:</td>
                            <td>&nbspN/A</td>
                        <tr>
                    @endif
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="bidang-sub-bidang" class="col-sm-2 col-form-label">Bidang/Sub Bidang</label>
            <div class="col-sm-12   ">
                <div class="table-responsive">
                    <table class="table table-bordered">
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
        <div class="form-group">
            <label for="material" class="col-sm-2 col-form-label">Material</label>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
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
    </div>
    {{-- button --}}
    <div class="col-12">
        <a href="#usulan-perubahan" data-toggle="modal" class="btn btn-warning btn-sm mb-2">
            <i class="fas fa-plus-circle"></i> Usulan Perubahan
        </a>
        <a href="{{ route('setting-persiapan.index') }}" class="btn btn-info btn-sm mb-2">
            <i class="fas fa-sliders-h"></i> Setting Persiapan Pengadaan
        </a>
        <a href="{{ route('persiapan-pengadaan.undangan') }}" class="btn btn-primary btn-sm mb-2">
            <i class="fas fa-mail-bulk"></i> Undang Penyedia (0)
        </a>
        <a href="" class="btn btn-success btn-sm mb-2">
            <i class="fas fa-clipboard-check"></i> Register
        </a>
        <a href="" class="btn btn-danger btn-sm mb-2">
            <i class="fas fa-trash"></i> Hapus
        </a>
    </div>
    {{-- detail --}}
    <div class="col-12 p-0">
        <div class="card card-dark card-outline card-tabs mb-0">
            <div class="card-header p-0">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#rincian-item"
                            role="tab" aria-controls="rincian-item" aria-selected="true">Rincian
                            Item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                            href="#persyaratan-pengadaan" role="tab" aria-controls="persyaratan-pengadaan"
                            aria-selected="true">Persyaratan Pengadaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                            href="#pelaksana-pengadaan" role="tab" aria-controls="pelaksana-pengadaan"
                            aria-selected="false">Pelaksana Pengadaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                            href="#perusahaan-diundang" role="tab" aria-controls="perusahaan-diundang"
                            aria-selected="false">Perusahaan Diundang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#activity-log"
                            role="tab" aria-controls="activity-log" aria-selected="false">Activity
                            Log</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                            href="#activity-resume" role="tab" aria-controls="activity-resume"
                            aria-selected="false">Activity
                            Resume</a>
                    </li>
                </ul>
            </div>
            <div class="card-body table-responsive p-0">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    {{-- rincian item --}}
                    <div class="tab-pane fade show active p-3" id="rincian-item" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">

                        @include('persiapanPengadaan.rincianItemPengadaan')

                    </div>
                    {{-- persyaratan pengadaan --}}
                    <div class="tab-pane fade" id="persyaratan-pengadaan" role="tabpanel"
                        aria-labelledby="custom-tabs-one-home-tab">

                        @include('persiapanPengadaan.persyaratanPengadaan')

                    </div>
                    {{-- pelaksana pengadaan --}}
                    <div class="tab-pane fade p-3" id="pelaksana-pengadaan" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">

                        @include('persiapanPengadaan.pelaksanaPengadaan')

                    </div>
                    {{-- perusahaan diundang --}}
                    <div class="tab-pane fade p-3" id="perusahaan-diundang" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">

                        @include('persiapanPengadaan.perusahaanDiundang')

                    </div>
                    {{-- activity log --}}
                    <div class="tab-pane fade p-3" id="activity-log" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">

                        @include('persiapanPengadaan.activityLog')

                    </div>
                    {{-- activity resume --}}
                    <div class="tab-pane fade p-3" id="activity-resume" role="tabpanel"
                        aria-labelledby="custom-tabs-one-profile-tab">

                        @include('persiapanPengadaan.activityResume')

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
