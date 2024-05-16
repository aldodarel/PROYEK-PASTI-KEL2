<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat')
@section('page_name', "Data Jemaat")
@section('content')
    @include('components.formjemaat')
@endsection