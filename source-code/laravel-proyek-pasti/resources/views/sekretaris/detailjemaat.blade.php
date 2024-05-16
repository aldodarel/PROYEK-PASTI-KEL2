<?php
    $navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Detail Jemaat")
@section('content')
    @include('components.detailjemaat')
@endsection