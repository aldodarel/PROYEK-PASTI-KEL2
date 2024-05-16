<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Keuangan Aktif')
@section('page_name', 'Kelola Keuangan Aktif')
@section('navbar_content')

@endsection
@section('content')
    @include('components.datakeuangan')
@endsection