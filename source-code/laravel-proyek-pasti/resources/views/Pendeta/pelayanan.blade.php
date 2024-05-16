<?php
$navbars = StaticVariable::$navbarPendeta;
?>



@extends('layouts.home')

@section('title', 'pelayanan')
@section('page_name', 'Pelayanan')

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
                            <h2 class="text">Daftar Pelayanan</h2>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mt-3 col-6">
                                <form action="{{ route('pendeta.getpelayanan') }}" method="POST">
                                    @csrf
                                    {{-- <select name="sektor_id" id="sektor_id" class="form-control"
                                        onchange="this.form.submit()">
                                        <option disabled selected>Pilih Sektor</option>
                                        @foreach ($sektors as $sektor)
                                            <option value="{{ $sektor->id }}">{{ $sektor->nama }}</option>
                                        @endforeach
                                    </select> --}}


                                    {{-- <select name="nik" id="nik" class="form-control"
                                        onchange="this.form.submit()">
                                        @foreach ($pelayan_gereja as $item)
                                            <option value="{{ $item->nik }}"
                                                {{ !old('nik') && $item->nik == 1212100107020001 ? 'selected' : '' }}
                                                {{ old('nik') == $item->nik ? 'selected' : '' }}>
                                                {{ $item->jemaat->name }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <select name="nik" id="nik" class="form-control"
                                        onchange="this.form.submit()">
                                        @isset($pelayan_gereja)
                                            @foreach ($pelayan_gereja as $item)
                                                <option value="{{ $item->nik }}"
                                                    {{ !old('nik') && $item->nik == 1212100107020001 ? 'selected' : '' }}
                                                    {{ old('nik') == $item->nik ? 'selected' : '' }}>
                                                    {{ $item->jemaat->name }}
                                                </option>
                                            @endforeach
                                        @endisset
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
                                            <th scope="col">Nama Ibadah</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status Pelayanan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jemaat_table_body">
                                        @foreach ($jadwal_pelayanan as $index => $pelayanan)
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    @if ($pelayanan && is_object($pelayanan->jadwalIbadah))
                                                        {{ $pelayanan->jadwalIbadah->name }}
                                                    @else
                                                        Nama Ibadah Tidak Tersedia
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($pelayanan && is_object($pelayanan->jadwalIbadah))
                                                        {{ $pelayanan->jadwalIbadah->tanggal }}
                                                    @else
                                                        Tanggal Tidak Tersedia
                                                    @endif
                                                </td>
                                                <td>{{ $pelayanan->status_pelayanan }}</td>
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
                    "lengthMenu": "Tampilkan _MENU_ Data Jadwal Pelayanan per Halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada jadwal pelayanan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total jadwal pelayanan)",
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
