<div class="modal fade" id="modal-kualifikasi">
    {{-- <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Spesifikasi Pengadaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form class="form-horizontal" action="" enctype="multipart/form-data">
                    <div class="card-body">                        
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>SPESIFIKASI</th>
                                    <th>BOBOT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="spesifikasi">
                                <tr>
                                    <td>
                                        <input type="text" name="spek[]" class="form-control"
                                            placeholder="Spesifikasi">
                                    </td>
                                    <td>
                                        <input type="text" name="bobot[]" class="form-control"
                                            placeholder="Bobot">
                                    </td>
                                    <td>
                                        <button id="tambah-baris" type="button" onclick="tambahBarisSpesifikasi()"
                                            class="btn btn-primary btn-xs">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>