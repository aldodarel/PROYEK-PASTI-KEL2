<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')

@section('page_name', 'Jadwal Ibadah')
@section('content')
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mt-2 mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-10">
                            <h2 class="text">Ubah Jadwal Ibadah</h2>
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->name }}">
                                @error('name')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->tanggal }}">
                                @error('tanggal')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="waktu">Jam</label>
                                <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                    name="waktu" placeholder="Masukkan Tanggal ..." value="{{ $jadwal->waktu }}">
                                @error('waktu')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Ibadah</label>
                                <select name="jenis" class="form-control" id="inputJemaat4">
                                    <option disabled selected>Pilih jenis ibadah</option>
                                    <option value="Mingguan" {{ $jadwal->jenis == 'Mingguan' ? 'selected' : '' }}>
                                        Mingguan</option>
                                    <option value="Situasional" {{ $jadwal->jenis == 'Situasional' ? 'selected' : '' }}>
                                        Situasional</option>
                                    <option value="Dukacita" {{ $jadwal->jenis == 'Dukacita' ? 'selected' : '' }}>
                                        Dukacita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="jumlah_hadir">Jumlah Hadir</label>
                                <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror"
                                    name="jumlah_hadir" placeholder="" value="{{ $jadwal->jumlah_hadir }}">
                                @error('jumlah_hadir')
                                    <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-block col-12 col-md-2 mt-3"
                                id="simpan">Ubah</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
