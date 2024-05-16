<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Data Keuangan")
@section('content')
    @include("components.formubahkeuangan")
@endsection