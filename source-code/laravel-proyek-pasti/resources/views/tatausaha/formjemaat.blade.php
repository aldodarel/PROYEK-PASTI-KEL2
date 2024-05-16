<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat')
@section('page_name', "Data Jemaat")
@section('content')
    @include('components.formjemaattatausaha')
@endsection