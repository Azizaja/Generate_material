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
                        <div class="row p-3">
                            <div class="col-6">
                                <div class="mb-3">
                                    <table class="align-top">
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>No RFQ</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Deskripsi</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Purchase Group</b></td>
                                            <td>:</td>
                                            <td></td>
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
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Payment Terms</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Collective Number</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambahkan Persiapan Pengadaaan</button>
                    <a href="#menu dashboard pengadaan" class="btn btn-primary"><i class="fas fa-th-list"></i> List Persiapan Pengadaaan</a>
                    <a href="{{ route('persiapan-pengadaan.sap')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <div class="col-12">
                    <div class="card card-primary card-tabs card-outline mb-0">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#item-lines" role="tab"
                                        aria-controls="item-lines" aria-selected="true">Item Lines
                                        </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#service-lines" role="tab"
                                        aria-controls="service-lines" aria-selected="true">Service Lines
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Item</td>
                                                    <td>123456</td>
                                                    <td>yang</td>
                                                    <td>semua</td>
                                                    <td>ada disinni</td>
                                                    <td>kita sudah </td>
                                                </tr>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Item</td>
                                                    <td>123456</td>
                                                    <td>yang</td>
                                                    <td>semua</td>
                                                    <td>ada disinni</td>
                                                    <td>kita sudah </td>
                                                </tr>
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
