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
                            <option value="" selected>Pilih Bidang Material</option>
                            {{-- @foreach ($detail_pekerjaan->bidang as $bidangs)
                                <option value="">[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub-bidang">Sub Bidang</label>
                        <select class="form-select" name="sub-bidang" id="sub-bidang">
                            <option value="" selected>Pilih Sub Bidang Material</option>
                            {{-- @foreach ($bidangs->subBidang as $subBidang)
                                <option value="">[{{ $subBidang->kode }}] - [{{ $subBidang->nama }}]</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kualifikasi">Kualifikasi</label>
                        <select class="form-select" name="kualifikassi" id="kualifikasi">
                            <option value="" selected>Pilih Kualifikasi</option>
                            {{-- @foreach ($subBidang->kualifikasiGroupDetail as $kualifikasi)
                                <option value="">[{{ $kualifikasi->kode }}] - [{{ $kualifikasi->nama }}]</option>
                            @endforeach --}}
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
                        <label for="material-group">Bidang Material</label>
                        <select class="form-select" name="material-group" id="material-group">
                            <option value="" selected>Material Group</option>
                            {{-- @foreach ($detail_pekerjaan->bidang as $bidangs)
                                <option value="">[{{ $bidangs->kode }}] - [{{ $bidangs->nama }}]</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material">Sub Bidang</label>
                        <select class="form-select" name="material" id="material">
                            <option value="" selected>Material</option>
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