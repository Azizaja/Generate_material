{{-- modal bidang material --}}
<div class="modal fade" id="modal-bidang-material" tabindex="-1" role="dialog" aria-labelledby="modal-bidang-material" aria-hidden="true">
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
                        <label for="nama_bidang_material">Nama Bidang Material</label>
                        <input type="text" class="form-control" id="nama_bidang_material" name="nama_bidang_material" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_bidang_material">Keterangan</label>
                        <textarea class="form-control" id="keterangan_bidang_material" name="keterangan_bidang_material" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Bidang/Sub Bidang</button>
                </div>
            </form>
        </div>
    </div>
</div>
