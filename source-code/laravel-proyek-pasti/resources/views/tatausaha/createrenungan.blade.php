<?php
$navbars = StaticVariable::$navbartatausaha;
?>

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Jadwal Ibadah')
@section('page_name', 'Renungan harian')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    @include('components.createrenungan')
    @include('sweetalert::alert')
@endsection