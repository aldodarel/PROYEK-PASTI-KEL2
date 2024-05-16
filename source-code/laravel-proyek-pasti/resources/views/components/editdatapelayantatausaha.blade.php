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
                            <h2 class="text">Ubah Data Pelayan</h2>
                            <p class="text">Data pelayan  dapat dengan mudah mengetahui informasi seputar data pelayan gereja.</p>
                            </div>
                            <div class="col-2 text-right">
                            <a href="{{ route('tatausaha.datapelayantatausaha') }}" class="btn btn-success p-2 ms-auto">
                              <i class="fa fa-arrow-left"></i>
                             <span>Kembali</span>
                                 </a>
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
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nik">No Nik</label>
                <input type="text" name="nik" id="nik" class="form-control" value="{{ $pelayanas['nik'] }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="peran">Peran</label>
                  <select name="peran" class="form-control" id="inputJemaat4" >
                    <option value="Pendeta" {{ $pelayanas->peran == "Pendeta" ? 'selected' : '' }}>Pendeta</option>                            
                    <option value="Penatua" {{ $pelayanas->peran == "Penatua" ? 'selected' : '' }}>Penatua</option>
                    <option value="Sekretaris Jemaat" {{ $pelayanas->peran == "Sekretaris Jemaat" ? 'selected' : '' }}>Sekretaris Jemaat</option>
                    <option value="Bendahara Jemaat" {{ $pelayanas->peran == "Bendahara Jemaat" ? 'selected' : '' }}>Bendahara Jemaat</option>
                    <option value="Tata Usaha" {{ $pelayanas->peran == "Tata Usaha" ? 'selected' : '' }}>Tata Usaha</option>
                     </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_terima_jabatan">Tanggal terima jabatan</label>
                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan" class="form-control" value="{{ $pelayanas['tanggal_terima_jabatan'] }}">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_akhir_jabatan">Tanggal akhir jabatan</label>
                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan" class="form-control" value="{{ $pelayanas['tanggal_akhir_jabatan'] }}">
            </div>
            <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-warning" id="simpan">
                   Ubah
                </button>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
        @endsection