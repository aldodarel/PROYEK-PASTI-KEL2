<?php
$navbars = StaticVariable::$navbartatausaha;
?>

@section('title', '')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-2 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col">
                            <h2 class="">Tambah Data Pelayan</h2>
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
                <label for="nik">No NIK</label>
                <input type="text" name="nik" id="nik" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="peran">Peran <strong style=" font-size: 9px;">*klik untuk memilih peran</strong></label>
                <select name="peran" class="form-control" id="inputJemaat4">
                  <option type="drop-down" disabled selected>Pilih Peran </option> 
                    <option value="Pendeta">Pendeta</option>                            
                    <option value="Penatua">Penatua</option>
                    <option value="Sekretaris Jemaat">Sekretaris Jemaat</option>
                    <option value="Bendahara Jemaat">Bendahara Jemaat</option>
                    <option value="Tata Usaha">Tata Usaha</option>
                     </select>
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
                   Simpan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ route('tatausaha.datapelayantatausaha') }}" class="btn btn-primary">
                             <span>Kembali</span>
                                 </a>
                            </div>
            </div>
        </div>
    </form>
</div>

@include('sweetalert::alert')