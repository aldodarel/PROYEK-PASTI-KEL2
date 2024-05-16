<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "")
@section('content')
    @include("components.formdatapelayan")
    @include('sweetalert::alert')
@endsection