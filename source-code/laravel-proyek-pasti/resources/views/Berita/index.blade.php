<?php
$navbars = StaticVariable::$navbartatausaha;
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>


@extends('layouts.home')

@section('title', 'Data Berita')

    <!-- Icons -->
    <link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
@section('page_name', 'Berita Gereja')
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <section class="mb-5">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-0 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Daftar Berita Gereja</h2>
                            </div>
<div class="col-12 p-3">
    <div class="col-12 shadow-sm rounded bg-white p-3">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warta_jemaat as $item)
                            <tr>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>
                                <img alt="" class="img-responsive img-fluid rounded" width="100" src="{{ asset('storage/' .$item->lampiran.'') }}">
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                    <a href="/ubah-berita/{{$item->id}}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pelayan" 
                                            class="btn btn-warning">Ubah</a>
                                    </div>
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
@include('sweetalert::alert')
    </section>
    @include('sweetalert::alert')
            @endsection
            <script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Daftar berita per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada keuangan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total Keuangan)",
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
