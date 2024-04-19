<div class="modal fade" id="modal-kewajaran-harga">
    {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Persyaratan Kewajaran Harga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form class="form-horizontal" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">                        
                        <div class="form-group row">
                            <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tipe" name="tipe" disabled value="Pilihan Benar/Salah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" value="Masukan Deskripsi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="jenis">
                                    <option selected="selected">Pilih Jenis</option>
                                    <option>Pembukaan dan Evaluasi</option>
                                    <option>Pembukaan</option>
                                    <option>Evaluasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p><span class="text-danger">*</span>Wajib Diisi</p>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>