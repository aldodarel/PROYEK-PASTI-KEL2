<?php
$navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Pelayan')
@section('page_name', 'Data Pelayan')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-3 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text"> Data Pelayan</h2>
                            <p class="text">Data pelayan dengan mudah anda lihat dibawah ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-12 p-3">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No NIK</th>
                            <th scope="col">Peran</th>
                            <th scope="col">Tanggal Terima Jabatan</th>
                            <th scope="col">Tanggal Akhir Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelayanas as $pelayan)
                            <tr>
                                <td>{{ $pelayan['nik'] }}</td>
                                <td>{{ $pelayan['peran'] }}</a></td>
                                <td>{{ $pelayan['tanggal_terima_jabatan'] }}</td>
                                <td>{{ $pelayan['tanggal_akhir_jabatan'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@include('sweetalert::alert')
    @include('sweetalert::alert')
@endsection