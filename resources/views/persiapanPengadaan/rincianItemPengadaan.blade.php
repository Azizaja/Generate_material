<div class="row">
    <div class="col-12">
        <h5 class="fw-bold">Rincian Item</h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>PR NUMBER</th>
                    <th>PR ITEM</th>
                    <th>KODE MATERIAL</th>
                    <th>NAMA</th>
                    <th>VOLUME</th>
                    <th>SATUAN</th>
                    <th>HARGA SATUAN</th>
                    <th>SUB TOTAL</th>
                    <th>AKSI</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($detail_pekerjaan->pekerjaanRincian as $rincianP)
                    @php
                        $total += $rincianP->harga_satuan * $rincianP->volume;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rincianP->maxPr->pr_no ?? '' }}</td>
                        <td>{{ $rincianP->maxPr->pr_line ?? '' }}</td>
                        <td>{{ $rincianP->maxPr->itemnum ?? '' }}</td>
                        <td>{{ $rincianP->nama }}</td>
                        <td>{{ $rincianP->volume }}</td>
                        <td>{{ $rincianP->satuan }}</td>
                        <td class="text-right">{{ 'Rp. ' . number_format($rincianP->harga_satuan, 2, ',', '.') }}</td>
                        <td class="text-right">
                            {{ 'Rp. ' . number_format($rincianP->harga_satuan * $rincianP->volume, 2, ',', '.') }}</td>
                        <td>
                            <a href="#modal-hps-{{ $rincianP->id }}" data-toggle="modal"
                                class="btn btn-info btn-md">HPS</a>
                            <a href="#modal-spesifikasi-{{ $rincianP->id }}" data-toggle="modal"
                                class="btn btn-success btn-md">Spesifikasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1rem">
        <div style="padding-left: 60%;">
            <table class="w-75 fw-bold">
                @php
                    $nilai_ppn = 0;
                    $nilai_ppn = 0.1 * $total;
                @endphp
                <tr>
                    <td>Jumlah Harga</td>
                    {{-- <td>:</td> --}}
                    <td>{{ 'Rp. ' . number_format($total, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>PPN 10%</td>
                    {{-- <td>:</td> --}}
                    <td>{{ 'Rp. ' . number_format($nilai_ppn, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    {{-- <td>:</td> --}}
                    <td>{{ 'Rp. ' . number_format($nilai_ppn + $total, 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
