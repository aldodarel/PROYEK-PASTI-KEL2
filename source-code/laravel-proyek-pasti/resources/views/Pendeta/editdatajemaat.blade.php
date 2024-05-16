<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Edit Jemaat')
@section('page_name', "")
@section('content')
    @include('components.editdatajemaat')
    @include('sweetalert::alert')
@endsection