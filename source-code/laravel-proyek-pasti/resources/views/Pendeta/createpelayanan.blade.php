<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Jadwal Pelayanan')
@section('page_name', 'Jadwal Pelayanan')

@section('content')
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedOptions = {}; // Variabel untuk menyimpan opsi terkini

            // Ketika sebuah opsi dipilih dalam salah satu select
            $("select").change(function() {
                var selectId = $(this).attr('id'); // ID select yang dipilih
                var selectedValue = $(this).val(); // Nilai yang dipilih

                // Mengaktifkan kembali opsi sebelumnya yang tersedia di select lainnya
                if (selectedOptions[selectId]) {
                    var previousValue = selectedOptions[selectId];
                    $("select").not(this).find("option[value='" + previousValue + "']").prop('disabled',
                        false).show();
                }

                // Menyimpan opsi terkini
                selectedOptions[selectId] = selectedValue;

                // Menonaktifkan dan menyembunyikan opsi yang dipilih dari semua select lainnya
                $("select").not(this).find("option[value='" + selectedValue + "']").prop('disabled', true)
                    .hide();
                // Mengembalikan opsi yang dipilih jika memilih opsi lain
                $("select").not(this).find("option:selected").prop('disabled', false).show();
            });
        });
    </script>







    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mt-2 mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col">
                            <h2 class="">Tambah Jadwal Pelayanan</h2>

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
                    <label class="form-control-label" for="pengkotbah">Pengkotbah </label>
                    <select name="id_pelayan[]" id="pengkotbah" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pengkotbah')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pengkotbah">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="liturgis">Liturgis </label>
                    <select name="id_pelayan[]" id="liturgis" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('liturgis')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Liturgis">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="doa_syafaat">Doa Syafaat </label>
                    <select name="id_pelayan[]" id="doa_syafaat" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('doa_syafaat')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Doa Syafaat">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="warta_jemaat">Warta Jemaat</label>
                    <select name="id_pelayan[]" id="warta_jemaat" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('warta_jemaat')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Warta Jemaat">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="pengumpul_persembahan1">Pengumpul Persembahan 1</label>
                    <select name="id_pelayan[]" id="pengumpul_persembahan1" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pengumpul_persembahan1')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pengumpul Persembahan 1">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="penerima_tamu1">Penerima Tamu 1</label>
                    <select name="id_pelayan[]" id="penerima_tamu1" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('penerima_tamu1')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Penerima Tamu 1">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="pengumpul_persembahan2">Pengumpul Persembahan 2</label>
                    <select name="id_pelayan[]" id="pengumpul_persembahan2" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pengumpul_persembahan2')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pengumpul Persembahan 2">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="penerima_tamu2">Penerima Tamu 2</label>
                    <select name="id_pelayan[]" id="penerima_tamu2" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('penerima_tamu2')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Penerima Tamu 2">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="pengumpul_persembahan3">Pengumpul Persembahan 3</label>
                    <select name="id_pelayan[]" id="pengumpul_persembahan3" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pengumpul_persembahan3')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pengumpul Persembahan 3">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="penerima_tamu3">Penerima Tamu 3</label>
                    <select name="id_pelayan[]" id="penerima_tamu3" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('penerima_tamu3')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Penerima Tamu 3">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="pengumpul_persembahan4">Pengumpul Persembahan 4</label>
                    <select name="id_pelayan[]" id="pengumpul_persembahan4" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pengumpul_persembahan4')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pengumpul Persembahan 4">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="pemusik">Pemusik</label>
                    <select name="id_pelayan[]" id="pemusik" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('pemusik')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Pemusik">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="song_leader">Song Leader</label>
                    <select name="id_pelayan[]" id="song_leader" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('song_leader')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Song Leader">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="liturgis_sekolah_minggu">Liturgis Sekolah Minggu</label>
                    <select name="id_pelayan[]" id="liturgis_sekolah_minggu" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($pelayan_gereja as $item)
                            <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                        @endforeach
                    </select>
                    @error('liturgis_sekolah_minggu')
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="Liturgis Sekolah Minggu">


                <div class="col-12 col-md-6 mt-4">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="{{ route('pendeta.jadwal') }}" class="btn btn-primary">
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
