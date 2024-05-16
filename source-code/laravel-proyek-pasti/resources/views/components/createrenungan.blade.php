<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')
@section('title', '')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Tambah Renungan Harian</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">
        <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="ayat">Ayat Renungan</label>
                            <input type="text" class="form-control @error('ayat') is-invalid @enderror" name="ayat" placeholder="" value="{{ old('ayat') }}">
                            @error('ayat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="" value="{{ old('title') }}">
                            @error('title')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror   
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="isi">Isi</label>
                            <input type="text" class="form-control @error('isi') is-invalid @enderror" name="isi" placeholder="" value="{{ old('isi') }}">
                            @error('isi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('tatausaha.renunganshow') }}" class="btn btn-primary">
                              <i class="fa fa-arrow-left"></i>
                             <span>Kembali</span>
</a>
            </div>
        </div>
    </form>
</div>
@endsection