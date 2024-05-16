<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Laporan Keuangan")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Ubah Laporan Keuangan";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($laporankeuangan as $laporan)
    <form class="mt-3" action="/tatausaha/data/laporan-keuangan/update/{{$laporan->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_laporan">Nama Laporan</label>
                <input type="text" name="nama_laporan" id="nama_laporan" class="form-control" value="{{ $laporan->nama_laporan }}">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="kategori_laporan">Kategori Laporan</label>
                <select name="kategori_laporan" id="kategori_laporan" class="form-control">
                    <option disabled selected>{{ $laporan->kategori_laporan }}</option>
                    <option value="Mingguan">Mingguan</option>
                    <option value="Bulanan">Bulanan</option>
                    <option value="Tahunan">Tahunan</option>
                </select>
            </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_awal">Tanggal Awal</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ $laporan->tanggal_awal }}">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            {{-- TODO: Make date format 'YYYY-MM-DD' --}}
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ $laporan->tanggal_akhir }}">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="saldo_sebelum">Saldo Sebelumnya(Rp)</label>
                <input type="number" name="saldo_sebelum" id="saldo_sebelum" class="form-control" value="{{ $laporan->saldo_sebelum }}">
        </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <!-- <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran</label>
                <input type="file" name="lampiran[]" class="form-control" id="lampiran" multiple>    
            </div>      -->
        </div>
        
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan Laporan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
    @endforeach
</div>
@endsection