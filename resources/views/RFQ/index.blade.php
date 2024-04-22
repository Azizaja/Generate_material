@extends('layouts.app')
@section('title', 'SAP-RFQ')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>SAP RFQ</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-upload"></i> Dummy
                                        RFQ</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-download"></i> Update
                                        RFQ SAP</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-th-list"></i> List
                                        Persiapan Pengadaaan</button>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover mb-2">
                                            <thead>
                                                <tr>
                                                    <th>NO RFQ</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>STATUS</th>
                                                    <th>VALIDITY START</th>
                                                    <th>VALIDITY END</th>
                                                    <th>PUCHASER GROUP</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($rfqs as $rfq)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('persiapan-pengadaan.detailRFQ', ['id' => $rfq->id]) }}"
                                                                title="detail RFQ">
                                                                <i class="fas fa-search"></i> {{ $rfq->rfq_num }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $rfq->rfq_desc }}</td>
                                                        <td>{{ RfqHelper::getStatusString($rfq->status) }}</td>
                                                        <td class="text-center">{{ $rfq->req_date ?? '-' }}</td>
                                                        <td class="text-center">{{ $rfq->rep_date ?? '-' }}</td>
                                                        <td>{{ '[' . $rfq->site . '] ' . RfqHelper::getStringMaxRfq('ekgrp', $rfq->site) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('persiapan-pengadaan.detailRFQ', ['id' => $rfq->id]) }}"
                                                                class="btn btn-success btn-xs" title="Detail Pengadaan">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            @if ($rfq->status == 0)
                                                                <a href="{{ route('persiapan-pengadaan.createPengadaan', ['id' => $rfq->id]) }}"
                                                                    class="btn btn-primary btn-xs"
                                                                    title="Tambahkan Pengadaan">
                                                                    <i class="fas fa-plus"></i>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">Tidak Ada Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-danger">Dummy RFQ</button>
                            <button type="submit" class="btn btn-primary">Update RFQ SAP</button>
                            <button type="submit" class="btn btn-primary">List Persiapan Pengadaaan</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        new DataTable('#example', {
            "autoWidth": false,
        });
    </script>
@endpush
