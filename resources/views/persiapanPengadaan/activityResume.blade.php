<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Activity Resume</h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <div class="row">
                        <th colspan="2" class="col-2">Tahap</th>
                        <th colspan="2" class="col-2">Judul</th>
                        <th colspan="2" class="col-2">User</th>
                        <th colspan="2" class="col-2">Tanggal</th>
                    </div>
                </tr>
            </thead>
            <tbody>
                @php
                    $panitia_logs_tim_panitia = App\Models\PekerjaanLog::where('kode', 'TIM_PANITIA')
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                    $panitia_logs_setting_pekerjaan = App\Models\PekerjaanLog::where('kode', 'SETTING_PEKERJAAN')
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                    $panitia_logs_undang_penyedia = App\Models\PekerjaanLog::where('kode', 'UNDANG_PENYEDIA')
                        ->where('pekerjaan_id', $detail_pekerjaan->id)
                        ->get();
                    $panitia_logs_akses = PekerjaanHelper::getAksesPanitiaByPekerjaanId(
                        $detail_pekerjaan->id,
                        'REGISTER_PEKERJAAN',
                        0,
                    );
                    $panitia_logs_approval = PekerjaanHelper::getAksesPanitiaByPekerjaanId(
                        $detail_pekerjaan->id,
                        'REGISTER_PEKERJAAN',
                        1,
                    );
                @endphp

                {{-- Setting Tim Panitia --}}
                <tr>
                    <td colspan="2">Setting Tim Panitia
                    </td>
                    <td colspan="6" class="p-0">
                        @if ($panitia_logs_tim_panitia)
                            @forelse ($panitia_logs_tim_panitia as $panitia_log_tim_panitia)
                                <table class="w-100 table-borderless">
                                    <tr class="{{ $loop->last ? '' : 'border-bottom' }}">
                                        <div class="row">
                                            <td class="col-4 border-end">
                                                {{ $panitia_log_tim_panitia->judul }}</td>
                                            <td class="col-4 border-end">
                                                {{ $panitia_log_tim_panitia->user_name }}</td>
                                            <td class="col-4">
                                                {{ $panitia_log_tim_panitia->created_at }}</td>
                                        </div>
                                    </tr>
                                </table>
                            @empty
                                <table class="w-100">
                                    <tr>
                                        <div class="row">
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                        </div>
                                    </tr>
                                </table>
                            @endforelse
                        @endif
                    </td>
                </tr>

                {{-- Setting Pekerjaan --}}
                <tr>
                    <td colspan="2">Setting Pekerjaan
                    </td>
                    <td colspan="6" class="p-0">
                        @if ($panitia_logs_setting_pekerjaan)
                            @forelse ($panitia_logs_setting_pekerjaan as $panitia_log_setting_pekerjaan)
                                <table class="w-100 table-borderless">
                                    <tr class="{{ $loop->last ? '' : 'border-bottom' }}">
                                        <div class="row">
                                            <td class="col-4 border-end">
                                                {{ $panitia_log_setting_pekerjaan->judul }}</td>
                                            <td class="col-4 border-end">
                                                {{ $panitia_log_setting_pekerjaan->user_name }}</td>
                                            <td class="col-4">
                                                {{ $panitia_log_setting_pekerjaan->created_at }}</td>
                                        </div>
                                    </tr>
                                </table>
                            @empty
                                <table class="w-100">
                                    <tr>
                                        <div class="row">
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                        </div>
                                    </tr>
                                </table>
                            @endforelse
                        @endif
                    </td>
                </tr>

                {{-- Undang Penyedia --}}
                <tr>
                    <td colspan="2">Undang Penyedia
                    </td>
                    <td colspan="6" class="p-0">
                        @if ($panitia_logs_undang_penyedia)
                            @forelse ($panitia_logs_undang_penyedia as $panitia_log_undang_penyedia)
                                <table class="w-100 table-borderless">
                                    <tr class="{{ $loop->last ? '' : 'border-bottom' }}">
                                        <div class="row">
                                            <td class="col-4 border-end">{{ $panitia_log_undang_penyedia->judul }}</td>
                                            <td class="col-4 border-end">{{ $panitia_log_undang_penyedia->user_name }}
                                            </td>
                                            <td class="col-4">{{ $panitia_log_undang_penyedia->created_at }}</td>
                                        </div>
                                    </tr>
                                </table>
                            @empty
                                <table class="w-100">
                                    <tr>
                                        <div class="row">
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                            <td class="col-4">-</td>
                                        </div>
                                    </tr>
                                </table>
                            @endforelse
                        @endif
                    </td>
                </tr>

                {{-- Register Pekerjaan --}}
                <tr>
                    <td colspan="2">Register Pekerjaan</td>
                    <td colspan="6" class="p-0">
                        <table class="w-100 table-borderless">
                            {{-- AKSES --}}
                            <tr>
                                <div class="row">
                                    <td colspan="2" class="border-end col-4">
                                        AKSES
                                    </td>
                                    <td colspan="6" class="p-0 col-8">
                                        <table class="w-100 table-borderless">
                                            <tr>
                                                <td class="p-0" colspan="6">
                                                    <table class="w-100 table-borderless">
                                                        @forelse ($panitia_logs_akses as $panitia_log_akses)
                                                            @php
                                                                $panitia_logs_akses_detail = App\Models\PekerjaanLog::where(
                                                                    'kode',
                                                                    'REGISTER_PEKERJAAN',
                                                                )
                                                                    ->where('pekerjaan_id', $detail_pekerjaan->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        $panitia_log_akses->pekerjaanPanitia
                                                                            ->applicationUser->id,
                                                                    )
                                                                    ->get();
                                                            @endphp
                                                            <tr>
                                                                <div class="row">
                                                                    <td class="border-end border-bottom col-6">
                                                                        {{ $panitia_log_akses->pekerjaanPanitia->applicationUser->nama }}
                                                                    </td>
                                                                    <td class="border-bottom p-0 col-6">
                                                                        <table class="w-100 table-borderless">
                                                                            @foreach ($panitia_logs_akses_detail as $panitia_log_akses_detail)
                                                                                <tr
                                                                                    class="{{ $loop->last ? '' : 'border-bottom' }}">
                                                                                    <td>
                                                                                        {{ $panitia_log_akses_detail->created_at ? $panitia_log_akses_detail->created_at : '-' }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </table>
                                                                    </td>
                                                                </div>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <div class="row">
                                                                    <td class="col-6">-</td>
                                                                    <td class="col-6">-</td>
                                                                </div>
                                                            </tr>
                                                        @endforelse
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </div>
                            </tr>

                            {{-- APPROVAL --}}
                            <tr>
                                <div class="row">
                                    <td colspan="2" class="border-end border-top col-5">
                                        APPROVAL
                                    </td>
                                    <td colspan="6" class="p-0 col-7">
                                        <table class="w-100 table-borderless">
                                            <tr>
                                                <td class="p-0" colspan="6">
                                                    <table class="w-100 table-borderless">
                                                        @forelse ($panitia_logs_approval as $panitia_log_approval)
                                                            @php
                                                                $panitia_logs_approval_detail = App\Models\PekerjaanLog::where(
                                                                    'kode',
                                                                    'REGISTER_PEKERJAAN',
                                                                )
                                                                    ->where('pekerjaan_id', $detail_pekerjaan->id)
                                                                    ->where(
                                                                        'user_id',
                                                                        $panitia_log_approval->pekerjaanPanitia
                                                                            ->applicationUser->id,
                                                                    )
                                                                    ->where(
                                                                        'judul',
                                                                        'Work Package Registration Approval',
                                                                    )
                                                                    ->get();
                                                            @endphp
                                                            <tr>
                                                                <div class="row">
                                                                    <td class="border-end border-bottom col-6">
                                                                        {{ $panitia_log_approval->pekerjaanPanitia->applicationUser->nama }}
                                                                    </td>
                                                                    <td class="border-bottom p-0 col-6">
                                                                        <table class="w-100">
                                                                            @foreach ($panitia_logs_approval_detail as $panitia_log_approval_detail)
                                                                                <tr
                                                                                    class="{{ $loop->last ? '' : 'border-bottom' }}">
                                                                                    <td>
                                                                                        {{ $panitia_log_approval_detail->created_at }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </table>
                                                                    </td>
                                                                </div>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <div class="row">
                                                                    <td class="border-end border-bottom col-6">-</td>
                                                                    <td class="col-6">-</td>
                                                                </div>
                                                            </tr>
                                                        @endforelse
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </div>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
