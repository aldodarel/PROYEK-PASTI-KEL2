<?php
    $navbars = StaticVariable::$navbarPenatua;
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "")
@section('content')
    @include("components.formdatapelayantatausaha")
    @include('sweetalert::alert')
@endsection