@extends('layouts.app')
@section('title', 'Setting Persiapan Pengadaan')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Pengaturan Metode Pengadaaan</b></h5>
                        </div>
                        <form class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no-pengadaan" class="col-sm-2 col-form-label">No Pengadaaan</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control w-75" id="no-pengadaan"
                                            value="{{ $detail_pekerjaan->kode ?? '' }}" name="no-pengadaan" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama-pengadaan" class="col-sm-2 col-form-label">Nama Pengadaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-75" id="nama-pengadaan"
                                            name="nama-pengadaan"
                                            value="{{ $detail_pekerjaan->nama ?? 'Masukan Nama Pengadaan' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hps" class="col-sm-2 col-form-label">Nilai HPS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-75" id="hps" name="hps"
                                            value="{{ PekerjaanHelper::getStringHPS($detail_pekerjaan->id) }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mata-uang" class="col-sm-2 col-form-label">Mata Uang</label>
                                    <div class="col-sm-10">
                                        <select class="form-select w-75" name="mata uang">
                                            <option selected="selected" disabled>Pilih Mata Uang</option>
                                            @foreach (App\Models\Pekerjaan::getCurrencyArray() as $currency)
                                                {{-- <option value="{{ $currency }}">{{ $currency }}</option> --}}
                                                <option value="{{ $currency }}"
                                                    {{ $currency == $detail_pekerjaan->currency_id ? 'selected' : '' }}>
                                                    {{ $currency }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun-anggaran" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                                    <div class="col-sm-10">
                                        <select class="form-select w-75" name="tahun-anggaran">
                                            <option selected="selected" disabled>Pilih Tahun Anggaran</option>
                                            @for ($tahun = date('Y') + 1; $tahun >= 2019; $tahun--)
                                                <option value="{{ $tahun }}" placeholder="Isi Tahun (2022)"
                                                    {{ $tahun == $detail_pekerjaan->tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-select w-75" name="klasifikasi" id="klasifikasi">
                                            <option selected="selected" disabled>Pilih Klasifikasi</option>
                                            @foreach (App\Models\Klasifikasi::where('is_deleted', 0)->get() as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}"
                                                    {{ $detail_pekerjaan->klasifikasi_id != null && $klasifikasi->id == $detail_pekerjaan->klasifikasi_id ? 'selected' : '' }}>
                                                    {{ $klasifikasi->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="metode-pengadaan" class="col-sm-2 col-form-label">Metode pengadaan<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-select w-75" name="metode-pengadaan">
                                            <option selected="selected" disabled>Pilih Metode Pengadaaan</option>
                                            @foreach ($metode_pengadaans as $metode)
                                                <option value="{{ $metode->id }}"
                                                    {{ $detail_pekerjaan->metode_pengadaan_id != null && $metode->id == $detail_pekerjaan->metodePengadaan->id ? 'selected' : '' }}>
                                                    {{ $metode->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis-kontrak" class="col-sm-2 col-form-label">Jenis Kontrak<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-select w-75" name="jenis-kontrak">
                                            <option selected="selected" disabled>Pilih Jenis Kontrak</option>
                                            @foreach (PekerjaanHelper::getMetodeKontrakArr() as $metode_kontrak)
                                                <option value="{{ $metode_kontrak }}"
                                                    {{ $metode_kontrak == PekerjaanHelper::getMetodeKontrak($detail_pekerjaan->metode_kontrak) ? 'selected' : '' }}>
                                                    {{ $metode_kontrak }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="requester" class="col-sm-2 col-form-label">Requester<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-select select2 w-75" name="requester">
                                            <option selected="selected" disabled>Pilih Requester</option>
                                            @foreach (App\Models\ApplicationUser::doSelectPanitiaByInstansiSatuanKerjaAsArray(1) as $panitia)
                                                <option value="{{ $panitia }}"
                                                    {{ $panitia == $detail_pekerjaan->requester ? 'selected' : '' }}>
                                                    {{ $panitia }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status-multi-pemenang" class="col-sm-2 col-form-label">Status Multi
                                        Pemenang</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            @if ($detail_pekerjaan->status_multi_pemenang == 1)
                                                <input type="checkbox" class="form-check-input" id="multi-pemenang-check"
                                                    checked>
                                            @else
                                                <input type="checkbox" class="form-check-input" id="multi-pemenang-check">
                                            @endif

                                            <label class="form-check-label" for="multi-pemenang-check">Gunakan Status
                                                Multi
                                                Pemenang</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bidang" class="col-sm-2 col-form-label">Bidang/Sub Bidang</label>
                                    <div class="col-sm-10">
                                        <a href="#modal-bidang-material" class="btn btn-info btn-sm"
                                            data-toggle="modal">Tambah Bidang/Sub Bidang</a>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered w-75">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Bidang</th>
                                                        <th>Sub Bidang</th>
                                                        <th>Kualifikasi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($detail_pekerjaan->bidang as $bidangs)
                                                        @foreach ($bidangs->subBidang as $subBidang)
                                                            <tr>
                                                                <td>[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</td>
                                                                <td>[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $subBidang->kualifikasiGroupDetail->nama ?? '-' }}
                                                                </td>
                                                                <td>
                                                                    <a href="" class="btn btn-danger btn-sm"
                                                                        title="hapus" data-toggle="modal"><i
                                                                            class="fas fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center">Tidak Ada Data</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="material" class="col-sm-2 col-form-label">Material</label>
                                    <div class="col-sm-10">
                                        <a href="#modal-material" class="btn btn-info btn-sm" data-toggle="modal">Tambah
                                            Material</a>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered w-75">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Material</th>
                                                        <th>Group Material</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($detail_pekerjaan->pekerjaanSubCommodity as $pekerjaanSubCommodity)
                                                        <tr>
                                                            <td>{{ $pekerjaanSubCommodity->mSubCommodity->kode }} -
                                                                {{ $pekerjaanSubCommodity->mSubCommodity->nama }}
                                                            </td>
                                                            <td>{{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->kode }}
                                                                -
                                                                {{ $pekerjaanSubCommodity->mSubCommodity->mCommodity->nama }}
                                                            </td>
                                                            <td>
                                                                <a href="" class="btn btn-danger btn-sm"
                                                                    title="hapus" data-toggle="modal"><i
                                                                        class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
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
                                {{-- <div class="card-footer"> --}}
                                {{-- kembali ke detail persiapan pengadaan --}}
                                <p><span class="text-danger">*</span>Wajib Diisi</p>
                                <a href="{{ route('persiapan-pengadaan.show', ['id' => $detail_pekerjaan->id]) }}"
                                    type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                    Simpan</button>
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("klasifikasi").addEventListener("change", getDataBidang);

        function getDataBidang() {
            var klasifikasi_id = document.getElementById("klasifikasi").value;
            $.ajax({
                url: '{{ route('get-bidang') }}',
                type: 'POST',
                data: {
                    klasifikasi_id: klasifikasi_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    $('#bidang-material').empty();
                    $('#bidang-material').append(
                        '<option value="" disabled>Pilih Bidang Material</option>'
                    );
                    $.each(response, function(key, value) {
                        $('#bidang-material').append('<option value="' + key +
                            '">' +
                            value + '</option>');
                    });

                }
            });
        }
    </script>
    {{-- modal. --}}
    @include('settingPersiapanPengadaan.modal')
@endsection
