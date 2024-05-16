<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'Berita Gereja')
@section('page_name', 'Berita Gereja')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-4 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Berita Gereja</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col">
        <div class="card  shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Ubah Berita</h3>
            </div>
            <div class="card-body">
            @foreach ($warta_jemaat as $warta)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $warta->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Tanggal ..." value="{{ $warta->nama }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Isi Berita</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi">{{ $warta->isi }}</textarea>
                        @error('isi') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="lampiran">Lampiran</label>
                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" placeholder="Masukkan Tanggal ..." value="{{ $warta->lampiran }}" required>
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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