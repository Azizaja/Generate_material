<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Activity Resume</h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th colspan="2">Tahap</th>
                    <th colspan="2">Judul</th>
                    <th colspan="2">Tanggal</th>
                    <th colspan="2">User</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $kode = 'TIM_PANITIA';
                    $panitia_logs = App\Models\PekerjaanLog::where('kode', $kode)
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                @endphp
                @if (count($panitia_logs) > 1)
                    <tr>
                        <td rowspan="{{ count($panitia_logs) + 1 }}" colspan="2">Setting Tim Panitia</td>
                    </tr>
                    @foreach ($panitia_logs as $panitia_log)
                        <tr>
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Setting Tim Panitia</td>
                        @foreach ($panitia_logs as $panitia_log)
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        @endforeach
                    </tr>
                @endif

                @php
                    $kode = 'SETTING_PEKERJAAN';
                    $panitia_logs = App\Models\PekerjaanLog::where('kode', $kode)
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                @endphp
                @if (count($panitia_logs) > 1)
                    <tr>
                        <td rowspan="{{ count($panitia_logs) + 1 }}" colspan="2">Setting Tim Panitia</td>
                    </tr>
                    @foreach ($panitia_logs as $panitia_log)
                        <tr>
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Setting Tim Panitia</td>
                        @foreach ($panitia_logs as $panitia_log)
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        @endforeach
                    </tr>
                @endif
                @php
                    $kode = 'UNDANG_PENYEDIA';
                    $panitia_logs = App\Models\PekerjaanLog::where('kode', $kode)
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                @endphp
                @if (count($panitia_logs) > 1)
                    <tr>
                        <td rowspan="{{ count($panitia_logs) + 1 }}" colspan="2">Setting Tim Panitia</td>
                    </tr>
                    @foreach ($panitia_logs as $panitia_log)
                        <tr>
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Setting Tim Panitia</td>
                        @foreach ($panitia_logs as $panitia_log)
                            <td colspan="2">{{ $panitia_log->judul }}</td>
                            <td colspan="2">{{ $panitia_log->created_at }}</td>
                            <td colspan="2">{{ $panitia_log->user_name }}</td>
                        @endforeach
                    </tr>
                @endif

                @php
                    $kode = 'REGISTER_PEKERJAAN';
                    $panitia_logs = App\Models\PekerjaanLog::where('kode', $kode)
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                @endphp
                <tr>
                    <td rowspan="10" colspan="2">Register Pekerjaan</td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="2">AKSES</td>
                    <td colspan="3">User</td>
                    <td colspan="4">Tanggal</td>
                </tr>
                <tr>
                    <td colspan="3">Puchaser</td>
                    <td colspan="5">01-01-2028</td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="2">APPROVAL</td>
                    <td colspan="3">User</td>
                    <td colspan="4">Tanggal</td>
                </tr>
                <tr>
                    <td colspan="3">Puchaser</td>
                    <td colspan="5">01-01-2028</td>
                </tr>




                {{-- <tr>
                    <td>SETTING USERNAME</td>
                    <td colspan="3">
                <tr>
                    <td>SETTING USERNAME</td>
                    <td>28-9-2022</td>
                    <td>USER PURCHASER 1</td>
                </tr>
                </td>

                </tr>
                <tr>
                    <td>1</td>
                    <td>SETTING USERNAME</td>
                    <td>28-9-2022</td>
                    <td>USER PURCHASER 1</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
