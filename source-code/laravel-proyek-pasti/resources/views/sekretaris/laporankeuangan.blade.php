<?php
$navbars = StaticVariable::$navbarSekretaris;
?>
@extends('layouts.home3')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', 'Kelola Laporan Keuangan')
@section('navbar_content')

@endsection
@section('content')
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<style type="text/css">
    .my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>     
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        @if($massages = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$massages}}
          </div>
        @endif
        <div class="col-2 d-flex">
            <a href="/sekretaris/data/laporan-keuangan/add"  class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Laporan Keuangan</span>
            </a>
        </div>
        <div class="col-12 mt-3">
        <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered mb-0" id="list">
                    <thead>
                        <tr>
                            <th scope="col">Nama Laporan</th>
                            <th scope="col">Tanggal Awal</th>
                            <th scope="col">Tanggal Akhir</th>
                            <th scope="col">Kategori Laporan</th>
                            <th scope="col">Saldo Awal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pilihan</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                        @foreach ($laporankeuangan as $laporan)
                            <tr>
                                <td>{{ $laporan -> nama_laporan}}</td>
                                <td>{{ $laporan -> tanggal_awal}}</td>
                                <td>{{ $laporan -> tanggal_akhir}}</td>
                                <td>{{ $laporan -> kategori_laporan}}</td>
                                <td>{{ $laporan -> saldo_sebelum}}</td>
                                <td><b>{{ $laporan -> status_laporan}}</b></td>
                                <td style="">
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Keuangan" href="/sekretaris/data/laporan-keuangan/edit/{{$laporan->id}}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan Laporan Keuangan" href="/sekretaris/data/laporan-keuangan/edit/status/{{ $laporan->id }}"
                                            class="btn btn-danger"><i class="fa fa-remove"></i></a>
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
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Keuangan per halaman",
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
@endsection