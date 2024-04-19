@extends('layouts.app')
@section('title', 'SAP RFQ')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Detail Po</b></h5>
                        </div>
                        @php
                            $otherAttr = json_decode($rfq->other_attr);
                        @endphp
                        <div class="row p-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <table class="align-top">
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td>:</td>
                                            <td>{{ RfqHelper::getStatusString($rfq->status) }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>No RFQ</b></td>
                                            <td>:</td>
                                            <td>{{ $rfq->rfq_num }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Deskripsi</b></td>
                                            <td>:</td>
                                            <td>{{ $rfq->rfq_desc }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Purchase Group</b></td>
                                            <td>:</td>
                                            <td>{{ '[' . $rfq->site . '] ' . RfqHelper::getStringMaxRfq('ekgrp', $rfq->site) }}

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <table class="align-top">
                                        <tr>
                                            <td><b>Additional Information</b></td>
                                            <td>:</td>
                                            <td>{{ $otherAttr->INCO2 }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Payment Terms</b></td>
                                            <td>:</td>
                                            <td>{{ '[' . $otherAttr->ZTERM . '] ' . RfqHelper::getStringMaxRfq('dzterm', $otherAttr->ZTERM) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Collective Number</b></td>
                                            <td>:</td>
                                            <td>{{ $otherAttr->SUBMI }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($rfq->status == 0)
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambahkan Persiapan
                            Pengadaaan</button>
                    @endif
                    <a href="#menu dashboard pengadaan" class="btn btn-primary"><i class="fas fa-th-list"></i> List
                        Persiapan Pengadaaan</a>
                    <a href="{{ route('persiapan-pengadaan.sap') }}" class="btn btn-danger"><i
                            class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <div class="col-12">
                    <div class="card card-primary card-tabs card-outline mb-0">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#item-lines" role="tab" aria-controls="item-lines"
                                        aria-selected="true">Item Lines
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#service-lines" role="tab" aria-controls="service-lines"
                                        aria-selected="true">Service Lines
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="item-lines" role="tabpanel"
                                    aria-labelledby="item-lines-tab">
                                    <div class="table-responsive p-3">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>LINE NUM</th>
                                                    <th>TIPE</th>
                                                    <th>MAT NUMBER</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>QTY</th>
                                                    <th>UNIT</th>
                                                    <th>WBS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $itemLines = $rfq->MaxRfqline()->where('line_type', 'ITEM')->get();
                                                @endphp
                                                @forelse ($itemLines as $itemLine)
                                                    @php
                                                        $otherAttrMaxRfqline = json_decode($itemLine->other_attr);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $itemLine->line_num }}</td>
                                                        <td>{{ $itemLine->line_type }}</td>
                                                        <td>{{ $itemLine->itemnum }}</td>
                                                        <td>{{ $itemLine->line_desc }}</td>
                                                        <td>{{ $itemLine->order_qty }}</td>
                                                        <td>{{ $itemLine->line_unit }}</td>
                                                        <td>{{ $otherAttrMaxRfqline->POSID ?? '' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            Data Tidak Ditemukan
                                                        </td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="service-lines" role="tabpanel"
                                    aria-labelledby="service-lines-tab">
                                    <div class="table-responsive p-3">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>LINE NUM</th>
                                                    <th>TIPE</th>
                                                    <th>MAT NUMBER</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>QTY</th>
                                                    <th>UNIT</th>
                                                    <th>WBS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $serviceLines = $rfq
                                                        ->MaxRfqline()
                                                        ->where('line_type', 'SERVICE')
                                                        ->get();
                                                @endphp
                                                @forelse ($serviceLines as $serviceLine)
                                                    @php
                                                        $otherAttrMaxRfqline = json_decode($serviceLine->other_attr);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $serviceLine->line_num }}</td>
                                                        <td>{{ $serviceLine->line_type }}</td>
                                                        <td>{{ $serviceLine->itemnum }}</td>
                                                        <td>{{ $serviceLine->line_desc }}</td>
                                                        <td>{{ $serviceLine->order_qty }}</td>
                                                        <td>{{ $serviceLine->line_unit }}</td>
                                                        <td>{{ $otherAttrMaxRfqline->POSID ?? '' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            Data Tidak Ditemukan
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
