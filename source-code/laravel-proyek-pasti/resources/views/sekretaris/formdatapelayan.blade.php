<?php
    $navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "Data Pelayan")
@section('content')
    @include("components.formdatapelayan")
    @include('sweetalert::alert')
@endsection