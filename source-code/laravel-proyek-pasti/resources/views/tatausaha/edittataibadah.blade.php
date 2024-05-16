<?php
$navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tata Ibadah')
@section('page_name', 'Tata Ibadah')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>s
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Tambah Tata Ibadah";
?>
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Ubah Tata Ibadah </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-12 p-3 bg-white shadow rounded">
    {{-- TODO: Controller not ready yet --}}
    @foreach ($tata_ibadah as $war)
    <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                            <label class="form-control-label" for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Tanggal ..." value="{{ $war->nama }}">
                            @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
            <div class="form-group col-12 col-md-6 mt-3">
                            <label class="form-control-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan Tanggal ..." value="{{ $war->tanggal }}">
                            @error('tanggal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>   
            <div class="col-12 col-md-2">
            <button  type="submit" class="btn btn-warning btn-block" id="simpan">Ubah</button>
            </div>
        </div>
    </form>
    @endforeach
</div>
    @include('sweetalert::alert')
@endsection