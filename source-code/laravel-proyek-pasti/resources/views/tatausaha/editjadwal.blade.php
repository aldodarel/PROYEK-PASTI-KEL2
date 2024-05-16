<?php
$navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@section('style', asset('css/style/pendeta.css'))
@section('title', 'Edit Jadwal')
@section('page_name', 'Edit Jadwal')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    @include('components.editjadwaltatausaha')
@endsection