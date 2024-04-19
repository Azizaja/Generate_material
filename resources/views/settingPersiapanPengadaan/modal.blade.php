{{-- modal bidang material --}}
<div class="modal fade" id="modal-bidang-material" tabindex="-1" role="dialog" aria-labelledby="modal-bidang-material"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-bidang-material" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-bidang-material">Tambah Bidang Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="type" value="bidang_material">
                    <div class="form-group">
                        <label for="bidang-material">Bidang Material</label>
                        <select class="form-select" name="bidang-material" id="bidang-material">
                            @php
                                $bidangs = null;
                                if ($detail_pekerjaan->klasifikasi_id != null) {
                                    $bidangs = \App\Models\Bidang::where(
                                        'klasifikasi_id',
                                        $detail_pekerjaan->klasifikasi_id,
                                    )
                                        ->where('is_deleted', 0)
                                        ->get();
                                }
                            @endphp
                            @if ($bidangs)
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                @endforeach
                            @else
                                <option value="" selected disabled>Pilih Klasifikasi Terlebih Dahulu!</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub-bidang">Sub Bidang</label>
                        <select class="form-select" name="sub-bidang" id="sub-bidang">
                            <option value="" selected disabled>Pilih Sub Bidang Material</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kualifikasi">Kualifikasi</label>
                        <select class="form-select" name="kualifikassi" id="kualifikasi">
                            <option value="" selected disabled>Pilih Kualifikasi</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Bidang/Sub Bidang</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal material --}}
<div class="modal fade" id="modal-material" tabindex="-1" role="dialog" aria-labelledby="modal-material"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-material" action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-material">Tambah Bidang Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="type" value="material_id">
                    <div class="form-group">
                        <label for="material-group">Group Material</label>
                        <select class="form-select" name="material-group" id="material-group">
                            <option value="" selected disabled>Pilih Material Group</option>
                            {{-- @foreach ($pekerjaans->pekerjaanSubCommodity as $pekerjaanSubCommodity)
                                <option value="">{{ $pekerjaanSubCommodity->kode }} -{{ $pekerjaanSubCommodity->nama }}</option>
                            @endforeach --}}
                            @foreach ($group_materials as $item)
                                {{-- <option value="{{$item->kode}}">{{ $item->kode }} - {{ $item->nama }}</option> --}}
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material">Material</label>
                        <select class="form-select" name="material" id="material">
                            <option value="" selected disabled>Pilih Material</option>
                            {{-- @foreach ($bidangs->subBidang as $subBidang)
                                <option value="">[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Material</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bidang-material').change(function() {
            var bidangId = $(this).val();
            if (bidangId) {
                $.ajax({
                    url: '{{ route('get-sub-bidang') }}',
                    type: 'POST',
                    data: {
                        bidang_id: bidangId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        var subBidang = response.sub_bidang;
                        var kualifikasi = response.kualifikasi;


                        $('#sub-bidang').empty();

                        if (response.sub_bidang.length == 0) {
                            $('#sub_bidang').append(
                                '<option value="" disabled selected>Sub Bidang Tidak Tersedia</option>'
                            );
                        } else {
                            $('#sub-bidang').append(
                                '<option value="" disabled selected>Pilih Sub Bidang Material</option>'
                            );
                            $.each(subBidang, function(key, value) {
                                $('#sub-bidang').append('<option value="' + key +
                                    '">' +
                                    value + '</option>');
                            });
                        }


                        $('#kualifikasi').empty();
                        if (response.kualifikasi.length == 0) {
                            $('#kualifikasi').append(
                                '<option value="" disabled selected>Kualifikasi Tidak Tersedia</option>'
                            );
                        } else {
                            $('#kualifikasi').append(
                                '<option value="" disabled selected>Pilih Kualifikasi</option>'
                            );
                            $.each(kualifikasi, function(index, value) {
                                $stringValueKualifikasi = value.nama + '( ' +
                                    'Rp.' +
                                    value
                                    .pekerjaan_batas_bawah + ' sampai ' + 'Rp.' +
                                    value
                                    .pekerjaan_batas_atas + ' ) ';
                                $('#kualifikasi').append('<option value="' + value
                                    .id +
                                    '">' +
                                    $stringValueKualifikasi + '</option>');
                            });

                        }


                    }
                });
            } else {
                $('#sub-bidang').empty();
            }
        });
        $('#material-group').change(function() {
            var mCommodityId = $(this).val();
            console.log(mCommodityId);
            if (mCommodityId) {
                $.ajax({
                    url: '{{ route('get-m-sub-commodity') }}',
                    type: 'POST',
                    data: {
                        mCommodityId: mCommodityId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#material').empty();

                        if (response.length == 0) {
                            $('#material').append(
                                '<option value="" disabled selected>Material Tidak Tersedia</option>'
                            );
                        } else {
                            $('#material').append(
                                '<option value="" disabled selected>Pilih Material</option>'
                            );
                            $.each(response, function(key, value) {
                                $('#material').append('<option value="' + key +
                                    '">' +
                                    value + '</option>');
                            });
                        }
                    }
                });
            } else {
                $('#material').empty();
            }
        });
    });
</script>
