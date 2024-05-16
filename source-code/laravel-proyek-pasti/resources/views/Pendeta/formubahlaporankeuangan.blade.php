<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Laporan Keuangan")
@section('content')
    @include("components.formubahlaporankeuangan")
@endsection