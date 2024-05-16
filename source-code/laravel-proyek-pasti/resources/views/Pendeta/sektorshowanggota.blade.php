<?php
$navbars = StaticVariable::$navbarPendeta;
?>



@extends('layouts.home')

@section('title', 'sektor')
@section('page_name', 'Sektor')

<!-- Icons -->
<link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
<link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

@section('content')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

    <section class="mb-5">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mb-4">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <h2 class="text">Daftar Sektor</h2>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mt-3 col-6">
                                <form action="{{ route('pendeta.getsektor') }}" method="POST">
                                    @csrf
                                    {{-- <select name="sektor_id" id="sektor_id" class="form-control"
                                        onchange="this.form.submit()">
                                        <option disabled selected>Pilih Sektor</option>
                                        @foreach ($sektors as $sektor)
                                            <option value="{{ $sektor->id }}">{{ $sektor->nama }}</option>
                                        @endforeach
                                    </select> --}}
                                    <select name="sektor_id" id="sektor_id" class="form-control"
                                        onchange="this.form.submit()">
                                        @foreach ($sektors as $sektor)
                                            <option value="{{ $sektor->id }}"
                                                {{ !old('sektor_id') && $sektor->id == 1 ? 'selected' : '' }}
                                                {{ old('sektor_id') == $sektor->id ? 'selected' : '' }}>
                                                {{ $sektor->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <select name="sektor_id" id="sektor_id" class="form-control"
                                        onchange="this.form.submit()">
                                        @foreach ($sektors as $sektor)
                                            <option value="{{ $sektor->id }}"
                                                {{ old('sektor_id') == $sektor->id || (!$sektor_id && $sektor->id == 1) ? 'selected' : '' }}>
                                                {{ $sektor->nama }}
                                            </option>
                                        @endforeach
                                    </select> --}}




                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <div class="col-12 shadow-sm rounded bg-white p-3">
                        <div class="col-12">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="jemaat_table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jemaat_table_body">
                                        @foreach ($jemaat1 as $index => $data)
                                            <tr data-sektor="{{ $data->sektor_id }}" class="sektor-{{ $data->sektor_id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>{{ $data->no_telepon }}</td>
                                                <td>
                                                    <!-- Tambahkan tombol atau tautan aksi di sini jika diperlukan -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <div class="col-12 shadow-sm rounded bg-white p-3">
                        <div class="col-12">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="jemaat_table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jemaat_table_body">
                                        @foreach ($jemaat2 as $index => $data)
                                            <tr data-sektor="{{ $data->sektor_id }}"
                                                class="sektor-{{ $data->sektor_id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>{{ $data->no_telepon }}</td>
                                                <td>
                                                    <!-- Tambahkan tombol atau tautan aksi di sini jika diperlukan -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jemaat_table').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Penatua Sektor per Halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada penatua yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total sektor)",
                    "search": "Cari :",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "",
                        "previous": ""
                    },
                }
            });
        });
    </script>
@endsection
