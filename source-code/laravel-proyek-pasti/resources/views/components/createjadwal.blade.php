<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')
@section('title', 'Jadwal Ibadah')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col">
                            <h2 class="">Tambah Jadwal Ibadah</h2>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="name">Nama Jadwal</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{ old('name') }}">
                            @error('name')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="waktu">Pukul</label>
                            <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal') }}">
                            @error('waktu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
            <label class="form-control-label" for="pengulangan">Jenis Ibadah <strong style=" font-size: 9px;">*klik untuk memilih jadwal</strong></label>
                            <select name="pengulangan" id="pengulangan" class="form-control">
                            <option disabled selected>Pilih jenis ibadah</option>
                            <option value="Tidak Diulang">Tidak Diulang</option>
                            <option value="Perminggu">Perminggu</option>
                            <option value="Perbulan">Perbulan</option>
                            <option value="Pertahun">Pertahun</option>
                        </select>
                        @error('pengulangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('tatausaha.jadwal') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
            </div>
        </div>
    </form>
</div>
@endsection