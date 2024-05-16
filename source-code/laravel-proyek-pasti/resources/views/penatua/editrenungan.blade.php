<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')
@section('page_name', 'Renungan Harian')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-4 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Renungan</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col">
        <div class="card  shadow h-100">

            <div class="card-body">
            @foreach ($renungan as $renunganas)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="ayat">Ayat</label>
                            <input type="text" class="form-control @error('ayat') is-invalid @enderror" name="ayat" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->ayat }}">
                            @error('ayat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->title }}">
                            @error('title')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="isi">Isi</label>
                            <input type="tanggal" class="form-control @error('isi') is-invalid @enderror" name="isi" placeholder="Masukkan Tanggal ..." value="{{ $renunganas->isi }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    
                    <button  type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3" id="simpan">Ubah</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
        @endsection