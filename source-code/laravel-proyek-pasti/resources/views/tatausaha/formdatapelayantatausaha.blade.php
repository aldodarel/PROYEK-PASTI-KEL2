<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "Data Pelayan")
@section('content')
    @include("components.formdatapelayantatausaha")
    @include('sweetalert::alert')
@endsection