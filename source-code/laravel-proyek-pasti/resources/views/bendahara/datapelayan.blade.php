<?php
$navbars = StaticVariable::$navbarBendahara;
?>
@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Pelayan')
@section('page_name', '')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-3 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text"> Data Pelayan</h2>
                            <p class="text">Data pelayan dengan mudah anda lihat dibawah ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-12 p-3">
    <div class="col-12 shadow-sm rounded bg-white p-3">
        <div class="col-12">
            <div class="table-responsive-sm">
            <table class="table table-bordered" id="list">
                    <thead>
                        <tr>
                            <th scope="col">No NIK</th>
                            <th scope="col">Peran</th>
                            <th scope="col">Tanggal Terima Jabatan</th>
                            <th scope="col">Tanggal Akhir Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelayanas as $pelayan)
                            <tr>
                                <td>{{ $pelayan['nik'] }}</td>
                                <td>{{ $pelayan['peran'] }}</a></td>
                                <td>{{ $pelayan['tanggal_terima_jabatan'] }}</td>
                                <td>{{ $pelayan['tanggal_akhir_jabatan'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data pelayan per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada pelayan yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total pelayan)",
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
@include('sweetalert::alert')

    @include('sweetalert::alert')
@endsection