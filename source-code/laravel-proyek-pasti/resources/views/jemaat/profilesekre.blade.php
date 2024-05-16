<?php
    $navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Profile')
@section('page_name', "Profile")
@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3 text-center">
    <div class="row">
    <div class="col-md-7 col-12">
    <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Profil {{ $jemaat['name'] }}</h2>
                            <p class="text"></p>
                            </div>
                        </div>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <form action="/jemaat/profile/{nik}/edit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <tr>
                            @if (session()->has('berhasilupdatejemaat'))
                                <div class="alert alert-success" role="alert">
                                    <p>
                                        {{ session('berhasilupdatejemaat') }}
                                    </p>
                                </div>
                            @endif
                        </tr>
                        <tr>
                            <td>No NIK</td>
                            <td><input type="text" name="nik" class="form-control" id="inputJemaat" value="{{ $jemaat['nik'] }}" required disabled></td>
                        </tr>
                      
                        <tr>
                            <td>Profil</td>
                            <td><img name ="profile" class="form-control" src="{{ $jemaat->getAvatar() }}" id = "profile" alt="" style="width: 100px; height: 100px;" value="{{ $jemaat['profile'] }}" required>
                            <br>
                            <input type="file" name="profile" class="form-control" id="profile"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="name" class="form-control" id="inputJemaat1" value="{{ $jemaat['name'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" class="form-control" id="inputJema" value="{{ $jemaat['username'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin" class="form-control" id="inputJemaat2" required disabled>
                                
                                    <option value="Laki-laki" {{ $jemaat->jenis_kelamin == "Laki-laki" ? 'selected' : '' }} >Laki laki</option>
                                    <option value="Perempuan" {{ $jemaat->jenis_kelamin == "Perempuan" ? 'selected' : '' }} >Perempuan</option>
    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" class="form-control" id="inputJemaat3" value="{{ $jemaat['alamat'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control" id="inputJemaat4" required disabled>
    
                                    <option value="Aktif" {{ $jemaat->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                                    <option value="Meninggal" {{ $jemaat->status == "Meninggal" ? 'selected' : '' }}>Meninggal</option>
                                    <option value="Pindah" {{ $jemaat->status == "Pindah" ? 'selected' : '' }}>Pindah</option>
    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Pernikahan</td>
                            <td>
                                <select name="status_pernikahan" class="form-control" id="inputJemaat5" required disabled>
                                    <option value="Menikah" {{ $jemaat->status_pernikahan == "Menikah" ? 'selected' : '' }}>Menikah</option>
                                    <option value="Belum Menikah" {{ $jemaat->status_pernikahan == "Belum Menikah" ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="Cerai Mati" {{ $jemaat->status_pernikahan == "Cerai Mati" ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input type="text" name="tempat_lahir" class="form-control" id="inputJemaat6" value="{{ $jemaat['tempat_lahir'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Tanggal Baptis</td>
                            <td><input type="date" name="tanggal_baptis" class="form-control" id="inputJemaat7" value="{{ $jemaat['tanggal_baptis'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sidi</td>
                            <td><input type="date" name="tanggal_sidih" class="form-control" id="inputJemaat8" value="{{ $jemaat['tanggal_sidih'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Sektor Role</td>
                            <td>
                                <select name="sektor_role" id="inputJemaat9" class="form-control" required disabled>
                                    <option value="Penanggung Jawab" {{ $jemaat->sektor_role == "Penanggung Jawab" ? 'selected' : '' }}>Penanggung Jawab</option>
                                    <option value="Anggota" {{ $jemaat->sektor_role == "Anggota" ? 'selected' : '' }}>Anggota</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-warning" onclick="editjemaat()">Ubah</button></td>
                            <td><button type="submit" class="btn btn-success" id="tblSave" disabled>Simpan</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12">
                
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function editjemaat() {
    var elements = document.getElementById("inputJemaat"),
        elements0 = document.getElementById("inputJema"),
        elements1 = document.getElementById("inputJemaat1"),
        elements2 = document.getElementById("inputJemaat2"),
        elements3 = document.getElementById("inputJemaat3"),
        elements4 = document.getElementById("inputJemaat4"),
        elements5 = document.getElementById("inputJemaat5"),
        elements6 = document.getElementById("inputJemaat6"),
        elements7 = document.getElementById("inputJemaat7"),
        elements8 = document.getElementById("inputJemaat8"),
        elements9 = document.getElementById("inputJemaat9"),
        elements10 = document.getElementById("profile"),
        tblSave = document.getElementById("tblSave");
    if(elements.disabled == true && 
        elements0.disabled == true && 
       elements1.disabled == true &&
       elements2.disabled == true &&
       elements3.disabled == true &&
       elements4.disabled == true &&
       elements5.disabled == true &&
       elements6.disabled == true &&
       elements7.disabled == true &&
       elements8.disabled == true &&
       elements9.disabled == true &&
       elements10.disabled == true &&
       tblSave.disabled == true) {
        
        elements.disabled = false;
        elements0.disabled = false;
        elements1.disabled = false;
        elements2.disabled = false;
        elements3.disabled = false;
        elements4.disabled = false;
        elements5.disabled = false;
        elements6.disabled = false;
        elements7.disabled = false;
        elements8.disabled = false;
        elements9.disabled = false;
        elements10.disabled = false;
        tblSave.disabled = false;
    }
    else {
        elements.disabled = true;
        elements0.disabled = true;
        elements1.disabled = true;
        elements2.disabled = true;
        elements3.disabled = true;
        elements4.disabled = true;
        elements5.disabled = true;
        elements6.disabled = true;
        elements7.disabled = true;
        elements8.disabled = true;
        elements9.disabled = true;
        elements10.disabled = true;
        tblSave.disabled = true;
    }
}
</script>
@include('sweetalert::alert')
@endsection

