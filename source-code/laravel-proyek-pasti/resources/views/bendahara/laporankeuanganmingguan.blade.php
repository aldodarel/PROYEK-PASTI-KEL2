<?php
$navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Laporan Keuangan Mingguan')
@section('navbar_content')

@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        
        <div class="row">
        @foreach ($laporankeuangan as $laporan)
        
            <div class="col-sm-3 p-2">
            <div class="card text-white bg-primary mb-4">
               <a href="/bendahara/data/laporan-keuangan-mingguan/{{ $laporan->tanggal_awal }}/{{ $laporan->tanggal_akhir }}/{{ $laporan->id}}"  class="btn btn-primary"> 
                   <div class="card-body">
                        <h5 class="card-title">{{ $laporan->nama_laporan}}</h5>
                        <p style="font-size: 12px; text-align: center" >{{ $laporan->tanggal_awal}} sampai {{ $laporan->tanggal_akhir}}</p>
                    </div>
                </a>
            </div>
        </div>
        
        @endforeach
    </div>
            </div>
        </div>
    </div>
</div>
@endsection