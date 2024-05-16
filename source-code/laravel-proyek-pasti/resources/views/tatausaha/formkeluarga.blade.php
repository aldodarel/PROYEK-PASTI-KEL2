<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keluarga')
@section('page_name', "Data Keluarga")
@section('content')
    @include("components.formkeluarga")
@endsection