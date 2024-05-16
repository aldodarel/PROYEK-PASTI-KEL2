<?php
$navbars = StaticVariable::$navbarPendeta;
?>

@section('title', '')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="">Tambah Data Pelayan</h2>
                            <p class="text">Tambahkan data pelayan dengan mudah dengan klik tambah data pelayan dibawah.</p>
                            </div>
                            <div class="col-2">
                            <a href="{{ route('Pendeta.datapelayan') }}" class="btn btn-success p-2 ms-auto">
                              <i class="fa fa-arrow-left"></i>
                             <span>Kembali</span>
                                 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nik">No Nik</label>
                <input type="text" name="nik" id="nik" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="peran">Peran</label>
                <input type="text" name="peran" id="peran" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_terima_jabatan">Tanggal Terima Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_akhir_jabatan">Tanggal Akhir Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan" class="form-control">
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Tambahkan Data Pelayan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>

@include('sweetalert::alert')