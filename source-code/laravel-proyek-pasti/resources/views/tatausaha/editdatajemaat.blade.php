<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Edit Jemaat')
@section('page_name', "")
@section('content')
    @include('components.editdatajemaattatausaha')
@endsection