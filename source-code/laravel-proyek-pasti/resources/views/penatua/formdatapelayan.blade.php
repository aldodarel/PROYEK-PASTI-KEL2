<?php
    $navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "Data Pelayan")
@section('content')
    @include("components.formdatapelayan")
    @include('sweetalert::alert')
@endsection