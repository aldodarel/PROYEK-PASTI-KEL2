<?php
    $navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home4')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Detail Jemaat")
@section('content')
    @include('components.detailjemaat')
@endsection