<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keluarga')
@section('page_name', $keluarga->nama_keluarga)
@section('content')
    @include('components.detailkeluarga')
@endsection