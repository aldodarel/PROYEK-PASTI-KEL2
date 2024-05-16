<?php
    $navbars = StaticVariable::$navbartatausaha;
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tata Ibadah')
@section('page_name', "Tata Ibadah")
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-3 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-10">
                            <h2 class="text">Lihat Tata Ibadah</h2>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Lampiran</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tata_ibadah as $war)
                            <tr>
                                <td>{{ $war['nama'] }}</td>
                                <td>{{ $war['tanggal'] }}</td>
                                <td><a target="_BLANK"
                                href="{{ $war['lampiran'] }}">Unduh File</a></td>
                                <td style="">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a href="/tatausaha/tataibadah/{{$war->id}}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Pelayan" 
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-12">
        </div>
        </div>
    </div>
</div>
</div>
@include('sweetalert::alert')
@endsection

<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data tata ibadah per halaman",
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