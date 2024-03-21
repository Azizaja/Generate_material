<div class="card card-dark card-outline card-tabs">
    <div class="card-header">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#kualifikasi"
                    role="tab" aria-controls="kualifikasi" aria-selected="true">Kualifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#administrasi" role="tab"
                    aria-controls="administrasi" aria-selected="true">Administrasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#teknis" role="tab"
                    aria-controls="teknis" aria-selected="false">Teknis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#kewajaran-harga"
                    role="tab" aria-controls="kewajaran-harga" aria-selected="false">Kewajaran
                    Harga</a>
            </li>
        </ul>
    </div>
    <div class="card-body p-0">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            {{-- kualifikasi --}}
            <div class="tab-pane fade show active" id="kualifikasi" role="tabpanel" aria-labelledby="kualifikasi-tab">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-plus-circle"></i> Buat Baru
                                    </a>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-cogs"></i> Konfigurasi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table responsive">
                            <table id="example2" class="table table-bordered table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TAHAP</th>
                                        {{-- <th>Dibuat</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pekerjaan->nama }}</td>
                                            <td>
                                                @switch($pekerjaan->status)
                                                    @case(50)
                                                        <span class="badge badge-warning">Persiapan
                                                            Pengadaan</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-warning">Pengadaan
                                                            Berjalan</span>
                                                    @break

                                                    @case(100)
                                                        <span class="badge badge-success">Pengadaan
                                                            Selesai</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-danger">Pengadaan
                                                            Batal</span>
                                                    @break
                                                @endswitch
                                                @if ($pekerjaan->status_multi_pemenang == 1)
                                                    <span class="badge badge-success">Multi
                                                        Pemenang</span>
                                                @endif
                                                @switch($pekerjaan->rev_status)
                                                    @case(App\Models\Pekerjaan::STATUS_REV)
                                                        <span class="badge badge-danger">Revisi</span>
                                                    @break

                                                    @case(App\Models\Pekerjaan::STATUS_REV_FREEZE)
                                                        <span class="badge badge-danger">Hold</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            {{-- <td>{{ $pekerjaan->created_at }}</td> --}}
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- administrasi --}}
            <div class="tab-pane fade" id="administrasi" role="tabpanel" aria-labelledby="administrasi-tab">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-plus-circle"></i> Buat Baru
                                    </a>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-cogs"></i> Konfigurasi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table responsive">
                            <table id="example2" class="table table-bordered table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TAHAP</th>
                                        {{-- <th>Dibuat</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pekerjaan->nama }}</td>
                                            <td>
                                                @switch($pekerjaan->status)
                                                    @case(50)
                                                        <span class="badge badge-warning">Persiapan
                                                            Pengadaan</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-warning">Pengadaan
                                                            Berjalan</span>
                                                    @break

                                                    @case(100)
                                                        <span class="badge badge-success">Pengadaan
                                                            Selesai</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-danger">Pengadaan
                                                            Batal</span>
                                                    @break
                                                @endswitch
                                                @if ($pekerjaan->status_multi_pemenang == 1)
                                                    <span class="badge badge-success">Multi
                                                        Pemenang</span>
                                                @endif
                                                @switch($pekerjaan->rev_status)
                                                    @case(App\Models\Pekerjaan::STATUS_REV)
                                                        <span class="badge badge-danger">Revisi</span>
                                                    @break

                                                    @case(App\Models\Pekerjaan::STATUS_REV_FREEZE)
                                                        <span class="badge badge-danger">Hold</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            {{-- <td>{{ $pekerjaan->created_at }}</td> --}}
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- teknis --}}
            <div class="tab-pane fade" id="teknis" role="tabpanel" aria-labelledby="teknis-tab">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-plus-circle"></i> Buat Baru
                                    </a>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-cogs"></i> Konfigurasi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table responsive">
                            <table id="example2" class="table table-bordered table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TAHAP</th>
                                        {{-- <th>Dibuat</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pekerjaan->nama }}</td>
                                            <td>
                                                @switch($pekerjaan->status)
                                                    @case(50)
                                                        <span class="badge badge-warning">Persiapan
                                                            Pengadaan</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-warning">Pengadaan
                                                            Berjalan</span>
                                                    @break

                                                    @case(100)
                                                        <span class="badge badge-success">Pengadaan
                                                            Selesai</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-danger">Pengadaan
                                                            Batal</span>
                                                    @break
                                                @endswitch
                                                @if ($pekerjaan->status_multi_pemenang == 1)
                                                    <span class="badge badge-success">Multi
                                                        Pemenang</span>
                                                @endif
                                                @switch($pekerjaan->rev_status)
                                                    @case(App\Models\Pekerjaan::STATUS_REV)
                                                        <span class="badge badge-danger">Revisi</span>
                                                    @break

                                                    @case(App\Models\Pekerjaan::STATUS_REV_FREEZE)
                                                        <span class="badge badge-danger">Hold</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td> 
                                            <!--<td>detail</td>-->
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- kewajaran harga --}}
            <div class="tab-pane fade" id="kewajaran-harga" role="tabpanel" aria-labelledby="kewajaran-harga-tab">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-plus-circle"></i> Buat Baru
                                    </a>
                                    <a href="" class="btn btn-primary mb-2">
                                        <i class="fas fa-cogs"></i> Konfigurasi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table responsive">
                            <table id="example2" class="table table-bordered table-hover mb-2">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TAHAP</th>
                                        {{-- <th>Dibuat</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pekerjaan->nama }}</td>
                                            <td>
                                                @switch($pekerjaan->status)
                                                    @case(50)
                                                        <span class="badge badge-warning">Persiapan
                                                            Pengadaan</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge badge-warning">Pengadaan
                                                            Berjalan</span>
                                                    @break

                                                    @case(100)
                                                        <span class="badge badge-success">Pengadaan
                                                            Selesai</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-danger">Pengadaan
                                                            Batal</span>
                                                    @break
                                                @endswitch
                                                @if ($pekerjaan->status_multi_pemenang == 1)
                                                    <span class="badge badge-success">Multi
                                                        Pemenang</span>
                                                @endif
                                                @switch($pekerjaan->rev_status)
                                                    @case(App\Models\Pekerjaan::STATUS_REV)
                                                        <span class="badge badge-danger">Revisi</span>
                                                    @break

                                                    @case(App\Models\Pekerjaan::STATUS_REV_FREEZE)
                                                        <span class="badge badge-danger">Hold</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            {{-- <td>dibuat</td> --}}
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

