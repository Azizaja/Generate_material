<div class="row">
    <h5 class="fw-bold">Pelaksana Pengadaan</h5>
    <form action="">
        <div class="form-group row">
            <label for="nama-pelaksana" class="col-sm-2 form-label">Nama Tim</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="nama-pelaksana" value="TIM PPGA32" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="tambah-anggota" class="col-sm-2 col-form-label">Tambah Anggota</label>
            <div class="col-sm-10">
                <select class="form-select" id="tambah-anggota">
                    <option selected>Pilih Anggota</option>
                    <option value="1">Purchaser</option>
                    <option value="2">Senior Manager 2</option>
                    <option value="3">admin verifikasi</option>
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-md mb-2">Tambahkan</button>
            <a href="{{ route('akses-pelaksana-pengadaan.index') }}" class="btn btn-primary btn-md mb-2">Akses Pelaksana
                Pengadaan</a>
        </div>
    </form>
    <div class="col-12">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>JABATAN</th>
                    <th>NAMA</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>ketua</td>
                    <td>GM Logistik</td>
                    <td>General Manager</td>
                    <td>
                        <a href="" data-toggle="modal" class="btn btn-danger btn-md">hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
