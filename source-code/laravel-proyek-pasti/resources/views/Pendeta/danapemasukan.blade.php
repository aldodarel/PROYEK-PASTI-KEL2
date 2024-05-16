<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Dana Pemasukan')
@section('page_name', 'Dana Pemasukan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.danapemasukan')
@endsection