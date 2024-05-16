<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Keuangan Non-Aktif')
@section('page_name', 'Kelola Keuangan Non-Aktif')
@section('navbar_content')

@endsection
@section('content')
    @include('components.datakeuangannonaktif')
@endsection