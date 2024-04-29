@extends('layouts.app')
@section('title', 'Konfirgurasi')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Konfigurasi Syarat {{$evaluasi}}</b></h5>
                        </div>
                        <form class="form-horizontal">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kualifikasi" class="col-form-label">Konfigurasi Syarat {{$evaluasi}}</label>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input class="checkbox" type="checkbox" name="pilih-all-kualifikasi[]"
                                                            id="pilih-all-kualifikasi">
                                                    </th>
                                                    <th>Keterangan</th>
                                                    <th>Tahap</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($persyaratans as $persyaratan)
                                                    <tr>
                                                        <td>
                                                            <input class="checkbox" type="checkbox" name="check-kualifikasi[]"
                                                                id="check-kualifikasi" value="{{ $persyaratan->id }}" {{in_array($persyaratan->id, $peksyarat) ? 'checked' : ''}}>
                                                            </td>
                                                        </td>
                                                        <td>{{ $persyaratan->deskripsi }}</td>
                                                        <td>
                                                            {{-- {{ PekerjaanPersyaratanHelper::getJenisDokumen($persyaratan->jenis) }} --}}
                                                            <select class="form-select" name="jenis" id="jenis">
                                                                <option value="{{PekerjaanPersyaratanHelper::getJenisDokumen(0)}}"
                                                                    {{$persyaratan->jenis && $persyaratan->jenis == 0 ? 'selected' : ''}}>
                                                                    {{PekerjaanPersyaratanHelper::getJenisDokumen(0)}}
                                                                </option>
                                                                <option value="{{PekerjaanPersyaratanHelper::getJenisDokumen(1)}}"
                                                                    {{ $persyaratan->jenis && $persyaratan->jenis == 1 ? 'selected' : '' }}>
                                                                    {{PekerjaanPersyaratanHelper::getJenisDokumen(1)}}
                                                                </option>
                                                                <option value="{{PekerjaanPersyaratanHelper::getJenisDokumen(2)}}"
                                                                    {{ $persyaratan->jenis && $persyaratan->jenis == 2 ? 'selected' : '' }}>
                                                                    {{PekerjaanPersyaratanHelper::getJenisDokumen(2)}}
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <div class="card-footer"> --}}
                                {{-- kembali ke detail persiapan pengadaan --}}
                                <a href="{{ route('persiapan-pengadaan.show', ['id' => $detail_pekerjaan->id]) }}"
                                    class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                {{-- </div> --}}
                            </div>
                        </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // new DataTable('#datatable', {
        //     "autoWidth": false,
        // });

        //check all checkbox
        $('#pilih-all-kualifikasi').click(function(e) {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });
    </script>
@endpush
