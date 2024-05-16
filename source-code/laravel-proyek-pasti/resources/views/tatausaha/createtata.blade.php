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
    </div>
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
                            <h2 class="text">Tambah Tata Ibadah </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-12 p-3 bg-white shadow rounded">
    {{-- TODO: Controller not ready yet --}}
    <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
                @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran</label>
                <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran[]" class="form-control" id="lampiran" value="{{ old('lampiran') }}" multiple >  
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror  
            </div>        
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('tatausaha.detailibadah')  }}" class="btn btn-primary">
                             <span>Kembali</span>
</a>
            </div>
        </div>
    </form>
</div>
    @include('sweetalert::alert')
@endsection