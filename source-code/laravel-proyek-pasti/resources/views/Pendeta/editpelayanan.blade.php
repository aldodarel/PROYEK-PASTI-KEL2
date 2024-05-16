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
    {{-- <script>
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
    </script> --}}


    <script>
        $(document).ready(function() {
            var selectedOptions = {}; // Variabel untuk menyimpan opsi terkini

            // Saat halaman dimuat, tandai opsi yang sudah dipilih secara otomatis dalam selectedOptions
            $("select").each(function() {
                var selectId = $(this).attr('id'); // ID select yang dipilih
                var selectedValue = $(this).val(); // Nilai yang dipilih
                if (selectedValue) {
                    selectedOptions[selectId] = selectedValue;

                    // Menyembunyikan opsi yang sudah dipilih secara otomatis dari select lainnya
                    $("select").not(this).find("option[value='" + selectedValue + "']").prop('disabled',
                        true).hide();
                }
            });

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

                // Menyembunyikan dan menonaktifkan opsi yang dipilih dari semua select lainnya
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
                @foreach ($status_pelayanan as $status)
                    <div class="form-group col-12 col-md-6 mt-3">
                        <label class="form-control-label" for="{{ ucfirst($status) }}">{{ ucfirst($status) }}</label>
                        <select name="id_pelayan[]" id="{{ ucfirst($status) }}" class="form-control">
                            <option value="">Pilih Nama Pelayan</option>
                            @foreach ($results[$status] as $result)
                                <option value="{{ $result->jemaat->nik }}" selected>
                                    {{ $result->jemaat->name }}
                                </option>
                            @endforeach
                            {{-- Loop untuk $pelayan_gereja --}}
                            @foreach ($pelayan_gereja as $item)
                                {{-- Memeriksa apakah opsi ini sudah dipilih dari $results[$status] --}}
                                @php
                                    $selectedInResults = false;
                                    foreach ($results[$status] as $result) {
                                        if ($result->jemaat->nik == $item['nik']) {
                                            $selectedInResults = true;
                                            break;
                                        }
                                    }
                                @endphp

                                {{-- Hanya tampilkan opsi jika tidak dipilih dari $results[$status] --}}
                                @if (!$selectedInResults)
                                    <option value="{{ $item['nik'] }}">{{ $item->jemaat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error(ucfirst($status))
                            <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="status_pelayanan[]" value="{{ ucfirst($status) }}">
                @endforeach


                <div class="col-12 col-md-6 mt-4">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                    <a href="{{ route('pendeta.jadwal') }}" class="btn btn-primary">
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
