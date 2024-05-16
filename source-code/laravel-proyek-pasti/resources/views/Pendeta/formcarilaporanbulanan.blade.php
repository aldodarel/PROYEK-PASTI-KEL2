<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Cari Laporan Bulanan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.formcarilaporanbulanan')
@endsection