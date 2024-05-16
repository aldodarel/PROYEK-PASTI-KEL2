<?php
    $navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Tambah Laporan Keuangan")
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<?php
    $header_title = "Form Tambah Laporan Keuangan";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="nama_laporan">Nama Laporan</label>
                <input type="text" name="nama_laporan" id="nama_laporan" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="kategori_laporan">Kategori Laporan</label>
                <select name="kategori_laporan" id="kategori_laporan" class="form-control">
                    <option disabled selected>Silahkan Pilih Jenis Laporan</option>
                    <option value="Mingguan">Mingguan</option>
                    <option value="Bulanan">Bulanan</option>
                    <option value="Tahunan">Tahunan</option>
                </select>
            </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_awal">Tanggal Awal</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            {{-- TODO: Make date format 'YYYY-MM-DD' --}}
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
        </div>
        <div class="form-group col-12 col-md-6 mt-3">
                <label for="saldo_sebelum">Saldo Sebelumnya(Rp)</label>
                <input type="number" name="saldo_sebelum" id="saldo_sebelum" class="form-control">
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <!-- <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran</label>
                <input type="file" name="lampiran[]" class="form-control" id="lampiran" multiple>    
            </div>      -->
            
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Tambahkan Laporan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
</div>
@endsection