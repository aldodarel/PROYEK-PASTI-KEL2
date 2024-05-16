<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Laporan Keuangan Bulanan')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<style type="text/css">
    .my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>     
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        @if($massages = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$massages}}
          </div>
        @endif
        <div class="col-12 d-flex">
            <a href="/sekretaris/data/laporan-keuangan/add"  class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Laporan Keuangan</span>
            </a>
        </div>
        <div class="col-12 mt-5">
        <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered mb-0" >
                    <thead>
                        <tr>
                            <th scope="col">Pilihan</th>
                            <th scope="col"></th>
                            <th scope="col">Nama Laporan</th>
                            <th scope="col">Tanggal Awal</th>
                            <th scope="col">Tanggal Akhir</th>
                            <th scope="col">Kategori Laporan</th>
                            <th scope="col">Saldo Awal</th>
                            <th scope="col">Status</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($laporankeuangan as $laporan)
                            <tr>
                                <td style="max-width:100px;">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/pendeta/data/laporan-keuangan/edit/{{$laporan->id}}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan Laporan Keuangan" href="/pendeta/data/laporan-keuangan/edit/status/{{ $laporan->id }}"
                                            class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                                <td></td>
                                <td>{{ $laporan -> nama_laporan}}</td>
                                <td>{{ $laporan -> tanggal_awal}}</td>
                                <td>{{ $laporan -> tanggal_akhir}}</td>
                                <td>{{ $laporan -> kategori_laporan}}</td>
                                <td>{{ $laporan -> saldo_sebelum}}</td>
                                <td><b>{{ $laporan -> status_laporan}}</b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection