<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Ubah Data Keuangan')
@section('page_name', "Ubah Data Keuangan")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<?php
    $header_title = "Form Ubah Data Keuangan";
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($keuangan as $datakeuangan)
    <form class="mt-3" action="/tatausaha/data/keuangan/update/{{ $datakeuangan->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control">
                    <option selected>{{ $datakeuangan->kategori}}</option>
                    <option value="Persembahan">Persembahan</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Bakti Bulanan dan Pembangunan">Bakti Bulanan dan Pembangunan</option>
                    <option value="Ucapan Syukur">Ucapan Syukur</option>
                    <option value="Penggalangan Dana">Penggalangan Dana</option>
                    <option value="Penggalangan Dana Eksternal">Penggalangan Dana Eksternal</option>
                    <option value="Biaya Pelayanan Rutin">Biaya Pelayanan Rutin</option>
                    <option value="Operasional Gereja">Operasional Gereja</option>
                    <option value="Tahun Gerejawi dan Ulang Tahun Gereja">Tahun Gerejawi dan Ulang Tahun Gereja</option>
                    <option value="Pembangunan">Pembangunan</option>
                    <option value="Diakonia">Diakonia</option>
                    <option value="Pengeluaran">Pendidikan</option>
                    <option value="Seksi Nyanyian dan Koor">Seksi Nyanyian dan Koor</option>
                    <option value="Pembinaan Kategorial">Pembinaan Kategorial</option>
                    <option value="Biaya Natal dan Tahun Baru">Biaya Natal dan Tahun Baru</option>
                    <option value="Pihak Lain">Pihak Lain</option>
                    <option value="Hari Besar Gereja">Hari Besar Gereja</option>
                    <option value="Pembangunan Jangka Panjang">Pembangunan Jangka Panjang</option>
                </select>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#kategori').select2();
                });
                </script>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" value=" {{ $datakeuangan->keterangan }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="jenis_keuangan">Jenis Tranksaksi</label>
                <select name="jenis_keuangan" id="jenis_keuangan" class="form-control">
                    <option selected>{{ $datakeuangan->jenis_keuangan}}</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal">Tanggal</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $datakeuangan->tanggal }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nominal">Nominal(Rp)</label>
                <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $datakeuangan->nominal }}">
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <!-- <div class="form-group col-12 col-md-6 mt-3">
                <label for="lampiran">Lampiran</label>
                <input type="file" name="lampiran[]" class="form-control" id="lampiran" multiple>    
            </div>      -->
        </div>
        <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>
   @endforeach
</div>
@endsection