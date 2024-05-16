<?php
    $navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Data Jemaat")
@section('content')
<?php
$header_title = "Tambah Data Jemaat";
?>
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 p-3 bg-white rounded shadow">
    @include('components.headerform')
    
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group mt-3 col-6">
                <label for="no_kk">NO KK</label>
                <input disabled type="text" value="{{ $keluarga['no_kk'] }}" name="no_kk" id="no_kk" class="form-control">
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" value="{{ $keluarga['nama_keluarga'] }}" disabled class="form-control">
            </div>

            <div class="form-group mt-3 col-6">
                <label for="nik">Masukkan NIK</label>
                <input type="text" name="nik" id="nik" class="form-control">
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mt-3 col-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="form-check">
                    <input value="Laki-laki" class="form-check-input" type="radio" name="jenis_kelamin"
                        id="jenis_kelamin1">
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki Laki
                    </label>
                </div>
                <div class="form-check">
                    <input value="Perempuan" class="form-check-input" type="radio" name="jenis_kelamin"
                        id="jenis_kelamin2">
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="posisi_di_keluarga">Posisi Di Keluarga</label>
                <select name="posisi_di_keluarga" id="posisi_di_keluarga" class="form-control">
                    <option disabled selected>Pilih posisi</option>
                    <option value="Suami">Suami</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
            </div>
            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status">Status Anggota</label>
                <select name="status" id="status" class="form-control">
                    <option disabled selected>Pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Meninggal">Meninggal</option>
                    <option value="Pindah">Pindah</option>
                </select>
            </div>

            <div class="form-group mt-3 col-6">
                <label for="status_pernikahan">Status Pernikahan</label>
                <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                    <option disabled selected>Pilih status pernikahan</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_baptis">Tanggal Baptis</label>
                <input type="date" name="tanggal_baptis" class="form-control" id="tanggal_baptis">
            </div>

            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_sidih">Tanggal Sidi</label>
                <input type="date" name="tanggal_sidih" class="form-control" id="tanggal_sidih">
            </div>

            {{-- TODO: Remember to add to varibel $sktors in controller --}}
            <div class="form-group mt-3 col-6">
                <label for="sektor_id">Sektor</label>
                <select name="sektor_id" id="sektor_id" class="form-control">
                    <option disabled selected>Pilih sektor dibawah</option>
                    @foreach ($sektors as $sektor)
                        <option value="{{ $sektor['id'] }}">{{ $sektor['nama'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3 col-6">
                <label for="sektor_role">Sektor Role</label>
                <select name="sektor_role" id="sektor_role" class="form-control">
                    <option disabled selected>Pilih posisi jemaat di sektor</option>
                    <option value="Penanggung Jawab">Penanggung Jawab</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
            <div class="col-6 mt-3">
                <div class="form-group mt-3">
                    <label for="lampiran">Lampiran</label>
                    <input type="file" name="lampiran[]" 
                    class="form-control"
                    id="lampiran" multiple>
                </div>

                <div class="form-group mt-3">
                    <label for="profile">Profile</label>
                    <input type="file" name="profile" class="form-control" id="profile">
                </div>
            </div>
            <div class="d-flex col-12 gap-3 mt-4">
                <button type="submit" class="btn btn-success ms-auto">
                    Tambah Jemaat
                </button>
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
            </div>
        </div>
    </form>
</div>
@endsection