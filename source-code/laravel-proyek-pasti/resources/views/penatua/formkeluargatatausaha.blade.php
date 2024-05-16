
<?php
    $navbars = StaticVariable::$navbarPenatua;
?>

@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Data Keluarga")
@section('content')
    @include("components.formkeluargatatausaha")
@endsection