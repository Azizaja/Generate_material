<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Activity Log</h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>DESKRIPSI</th>
                    <th>TAHAP</th>
                    <th>TANGGAL</th>
                    <th>USER</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pekerjaan->pekerjaanLog as $pekerjaanLog)
                    <tr>
                        <td>{{ $pekerjaanLog->judul }}</td>
                        <td>{{ PekerjaanHelper::getStatusString($detail_pekerjaan->status) }}</td>
                        <td>{{ $pekerjaanLog->created_at }}</td>
                        <td>{{ $pekerjaanLog->user_name }}</td>
                        <td>{!! $pekerjaanLog->deskripsi !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
