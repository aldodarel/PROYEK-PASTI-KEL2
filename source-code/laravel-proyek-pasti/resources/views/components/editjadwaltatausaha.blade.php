<?php
$navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-4 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Jadwal Ibadah</h2>
                            <p class="text">Jadwal ibadah  jemaat  dapat dengan mudah mengetahui informasi seputar jadwal ibadah gereja.</p>
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
            @foreach ($jadwal_ibadah as $jadwal)
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label class="form-control-label" for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->name }}">
                            @error('name')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <label class="form-control-label" for="waktu">Jam</label>
                            <input type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->waktu }}">
                            @error('waktu')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                <label for="pengulangan">Jenis Ibadah</label>
                  <select name="pengulangan" class="form-control" id="inputJemaat4" >
                    <option value="Tidak Diulang" {{ $jadwal->pengulangan == "Tidak Diulang" ? 'selected' : '' }}>Tidak Diulang</option>                            
                    <option value="Perminggu" {{ $jadwal->pengulangan == "Perminggu" ? 'selected' : '' }}>Perminggu</option>
                    <option value="Perbulan" {{ $jadwal->pengulangan == "Perbulan" ? 'selected' : '' }}>Perbulan</option>
                    <option value="Pertahun" {{ $jadwal->pengulangan == "Pertahun" ? 'selected' : '' }}>Pertahun</option>
                     </select>
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