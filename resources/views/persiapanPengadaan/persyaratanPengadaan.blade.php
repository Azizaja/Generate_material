<div class="card card-dark card-outline card-tabs">
    <div class="card-header">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            @foreach ($tabPersyaratans as $tabPersyaratan)
                @php
                    $rawNama = str_replace(' ', '_', Illuminate\Support\Str::of($tabPersyaratan->nama)->lower());
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="custom-tabs-one-home-tab" data-toggle="pill"
                        href="#{{ $rawNama }}" role="tab" aria-controls="{{ $rawNama }}"
                        aria-selected="true">{{ $tabPersyaratan->nama }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card-body p-0">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            {{-- Modal --}}
            @foreach ($tabPersyaratans as $tabPersyaratan)
                @php
                    $rawNama = str_replace(' ', '_', Illuminate\Support\Str::of($tabPersyaratan->nama)->lower());
                @endphp
                <div class="tab-pane fade  {{ $loop->first ? 'show active' : '' }}" id="{{ $rawNama }}"
                    role="tabpanel" aria-labelledby="{{ $rawNama }}-tab">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="#modal-{{ $rawNama }}" data-toggle="modal"
                                            class="btn btn-primary mb-2">
                                            <i class="fas fa-plus-circle"></i> Buat Baru
                                        </a>
                                        <a href="" class="btn btn-primary mb-2">
                                            <i class="fas fa-cogs"></i> Konfigurasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatable1" class="table table-bordered table-hover mb-2">
                                    <thead>
                                        <tr>
                                            <th>NO {{ $tabPersyaratan->nama }}</th>
                                            <th>NAMA</th>
                                            <th>TAHAP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $pekerjaan_persyaratans = App\Models\PekerjaanPersyaratan::where(
                                                'pekerjaan_id',
                                                $detail_pekerjaan->id,
                                            )
                                                ->where('evaluasi_id', $tabPersyaratan->id)
                                                ->get();
                                        @endphp
                                        @foreach ($pekerjaan_persyaratans as $pekerjaan_persyaratan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pekerjaan_persyaratan->deskripsi }}</td>
                                                <td>
                                                    {{ PekerjaanPersyaratanHelper::getJenisDokumen($pekerjaan_persyaratan->jenis) }}
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm m-1">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm m-1">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

{{-- modal --}}
{{-- @include('persiapanPengadaan.modal.modalKualifikasi')
@include('persiapanPengadaan.modal.modalAdministrasi')
@include('persiapanPengadaan.modal.modalTeknis')
@include('persiapanPengadaan.modal.modalKewajaranHarga') --}}

{{-- @push('scripts')
    <script>
        new DataTable("#datatable1");
        new DataTable("#datatable2");
        new DataTable("#datatable3");
        new DataTable("#datatable4");
    </script>
@endpush --}}
