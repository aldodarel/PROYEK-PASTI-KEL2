<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>

@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Jemaat')
@section('page_name', 'Data Jemaat')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 mt-5 p-3">
    <div class="col-12">
        <div class="row">
            @foreach ($datajemaats as $datajemaat)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4">
                    <div class="col-12 bg-white shadow-sm p-4 rounded">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datajemaat['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datajemaat['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datajemaat['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                <thead>
                    <th style="width: 130px;">NIK</th>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col-3">Sektor</th>
                    <th class="col-3">Alamat</th>
                    <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaats as $jemaat)
                            <tr>
                                <td>
                                    {{$jemaat['nik']}}
                                </td>
                                <td>
                                    {{ $jemaat->name }}</a>
                                </td>
                                <td>
                                    {{$jemaat['sektor']->nama}}
                                </td>
                                <td>
                                    {{$jemaat['alamat']}}
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a href="/sekretaris/data/jemaat/edit/{{ $jemaat->nik }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat" 
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="/sekretaris/data/jemaat/{{ $jemaat->nik }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jemaat" href="#"
                                            class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $jemaats->links() }}
        </div>
    </div>
</div>
@endsection

<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Jemaat per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada Jemaat yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total Jemaat)",
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
