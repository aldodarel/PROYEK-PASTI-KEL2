<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Detail Jemaat')
@section('page_name', "Detail Jemaat")
@section('content')
    @include('components.detailjemaat')
@endsection