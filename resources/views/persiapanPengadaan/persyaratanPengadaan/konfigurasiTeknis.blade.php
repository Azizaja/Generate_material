@extends('layouts.app')
@section('title', 'Konfirgurasi')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Konfigurasi Syarat Teknis</b></h5>
                        </div>
                            <form class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kualifikasi" class="col-form-label">Konfigurasi Syarat Teknis</label>
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input class="checkbox" type="checkbox" name="pilih-kualifikasi[]" id="pilih-kualifikasi">
                                                            </th>
                                                            <th>Keterangan</th>
                                                            <th>Tahap</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input class="checkbox" type="checkbox" name="check-kualifikasi" id="check-kualifikasi">
                                                            </td>
                                                            <td>Logistik dan perencanaan gudang pengendalian
                                                                komoditas</td>
                                                            <td>
                                                                <select class="form-select w-50" id="jenis">
                                                                    <option selected="selected">Pilih Jenis</option>
                                                                    <option>Pembukaan dan Evaluasi</option>
                                                                    <option>Pembukaan</option>
                                                                    <option>Evaluasi</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                    {{-- <div class="card-footer"> --}}
                                        {{-- kembali ke detail persiapan pengadaan --}}
                                        <button type="submit" class="btn btn-danger">Batal</button> 
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
        $('#pilih-kualifikasi').click(function (e) {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });
    </script>
@endpush