<?php
$navbars = StaticVariable::$navbartatausaha;
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    {{-- @include('components.datajemaat') --}}
@endsection>