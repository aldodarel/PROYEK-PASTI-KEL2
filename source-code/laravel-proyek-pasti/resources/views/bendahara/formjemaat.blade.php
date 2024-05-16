<?php
    $navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

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
                <label for="nik">No NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="" value="{{ old('nik') }}">
                            @error('nik')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{ old('name') }}">
                            @error('name')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mt-3 col-6">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="" value="{{ old('username') }}">
                            @error('username')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
                <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror" name="tanggal_baptis" placeholder="" value="{{ old('tanggal_baptis') }}">
                            @error('tanggal_baptis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>

            {{-- TODO: Need to format date --}}
            <div class="form-group mt-3 col-6">
                <label for="tanggal_sidih">Tanggal Sidi</label>
                <input type="date" class="form-control @error('tanggal_sidih') is-invalid @enderror" name="tanggal_sidih" placeholder="" value="{{ old('tanggal_sidih') }}">
                            @error('tanggal_sidih')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control @error('tempat_lahir') is-invalid @enderror" name="alamat" placeholder="" value="{{ old('alamat') }}"></textarea>
                @error('alamat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                <div class="form-group mt-3 col-6">
                <label for="lampiran">Lampiran</label>
                    <input type="file" class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" placeholder=""  id="lampiran" multiple value="{{ old('lampiran') }}">
                            @error('lampiran')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>

                <div class="form-group mt-3 col-6">
                    <label for="profile">Profile</label>
                    <input type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" placeholder="" value="{{ old('profile') }}">
                            @error('profile')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="d-flex col-2 gap-3 mt-4">
                <button type="submit" class="btn btn-success ms-auto">
                    Simpan
                </button>
                <button type="reset" class="btn btn-secondary">
                    Reset
                </button>
                <a href="{{ route('bendahara.datakeluarga') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
            </div>
        </div>
    </form>
</div>
@endsection