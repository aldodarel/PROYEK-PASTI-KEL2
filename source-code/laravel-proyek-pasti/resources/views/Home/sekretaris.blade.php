<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@section('style', asset('css/style/pendeta.css'))
@section('title', 'Home')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 mt-5 p-3">
    <div class="col-12">
        <div class="row">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-0 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-9">
                            <h2 class="text">Statistik Gereja</h2>
                            <p class="tex">statistik jemaat untuk mempermudah anda mengetahui informasi seputar jemaat.</p>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @foreach ($datakeluargas as $datumkeluarga)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4">
                    <div class="col-12 bg-white shadow-sm p-4 rounded">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datumkeluarga['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datumkeluarga['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datumkeluarga['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
