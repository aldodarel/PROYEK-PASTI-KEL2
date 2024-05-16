<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Detail Pelayanan')
@section('page_name', 'Detail Pelayanan')
@section('content')
    @include('components.detailpelayanan')
@endsection
