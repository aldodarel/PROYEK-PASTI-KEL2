<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Pelayan')
@section('page_name', "Data Pelayan")
@section('content')
    @include("components.formdatapelayan")
    @include('sweetalert::alert')
@endsection