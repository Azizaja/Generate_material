<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Perusahaan Diundang</h5>
        <a href="{{ route('persiapan-pengadaan.undangan') }}" class="btn btn-primary btn-md mb-3">
            <i class="fas fa-plus"></i> Tambah Perusahaan
        </a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>NPWP</th>
                    <th>PERUSAHAAN</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th>SATUAN KERJA</th>
                    <th>CATATAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1234567890</td>
                    <td>PT. Logistik</td>
                    <td>email@perusahaan.com</td>
                    <td>Jl. Jalan</td>
                    <td>Logistik</td>
                    <td>
                        <p>catatan perusahaaan ini</p>
                    </td>
                </tr>

                <tr class="text-center">
                    <td colspan="7">Tidak ada data</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>