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
