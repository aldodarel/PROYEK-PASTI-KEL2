<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Kelola Keuangan Non-Aktif')
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
        <div class="col-12 mt-1">
            <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered mb-0" >
                    <thead>
                        <tr>
                            <th scope="col">Pilihan</th>
                            <th scope="col"></th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jenis Tranksaksi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal(Rp)</th>
                            <th scope="col">Status</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody name="data" id="data">
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($datakeuangan as $keuangan)
                        <form action=""></form>
                            <tr>
                            <td style="max-width:100px;">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/bendahara/data/keuangan/edit/{{ $keuangan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan Keuangan" href="/bendahara/data/keuangan/edit/status/{{ $keuangan->id}}"
                                            class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                    </div>
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $keuangan -> kategori}}</td>
                                <td>{{ $keuangan -> keterangan}}</td>
                                <td>{{ $keuangan -> jenis_keuangan}}</td>
                                <td>{{ $keuangan -> tanggal}}</td>
                                <td>{{ $keuangan -> nominal}}</td>    
                                <td><b>{{ $keuangan -> status_keuangan}}</b></td>                     
                                <!-- <td>{{ $keuangan -> lampiran}}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection