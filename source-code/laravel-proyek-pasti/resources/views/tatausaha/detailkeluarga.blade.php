<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Detail Keluarga')
@section('page_name', $keluarga->nama_keluarga)
@section('content')
    @include('components.detailkeluargatatausaha')
@endsection