<?php
$navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')
@section('title', 'Berita Gereja')
@section('page_name', 'Berita Gereja')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Tambah Berita Gereja</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">
        <form autocomplete="off" action="{{  route('Berita.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="" value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="" value="{{ old('nama') }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label">Isi Berita</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi">{{ old('isi') }}</textarea>
                        @error('isi') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                    </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="lampiran">Lampiran</label>
                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" placeholder="" value="{{ old('lampiran') }}">
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('Berita.index') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
            </div>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection