<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css"/>


<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 mt-5 p-3">
    <div class="col-12">
        <div class="row">
            @foreach ($datakeluargas as $datumkeluarga)
                <div class="col-12 col-md-4 d-flex mt-md-0 mb-4">
                    <div class="col-12 bg-white shadow-sm p-4 rounded">
                        <div class="col-12 d-flex">
                            <div class="col-7">
                                <span>{{ $datumkeluarga['name'] }}</span>
                            </div>
                            <div class="col-5 rounded  d-flex justify-content-end">
                                <div class="rounded-circle {{ $datumkeluarga['color'] }} d-flex align-items-center justify-content-center"
                                    style="width: 60px;height:60px;">
                                    <i class="fa fa-user text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="fs-3 fw-bold">{{ $datumkeluarga['jumlah'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
    <div class="col-2 flex">
            <a href="/tatausaha/data/keluarga/add"  class="btn btn-success p-2 ms-auto">
                <i class="fa fa-plus"></i>
                <span>Tambah Data Keluarga</span>
            </a>
        </div>
        <br>
    <div class="row">
    <div class="col-8 d-flex text-right">
        </div>
        </div>
        <div class="col-12">
            <div class="table-responsive-sm">
                <table id="list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No KK</th>
                            <th scope="col">Nama Keluarga</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluargas as $keluarga)
                            <tr>
                                <td>{{ $keluarga['no_kk'] }}</td>
                                <td>{{ $keluarga['nama_keluarga'] }}</a></td>
                                <td>{{ $keluarga['alamat'] }}</td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        <a href="/tatausaha/editdatakeluarga/{{ $keluarga['no_kk'] }}" data-toggle="tooltip" data-placement="bottom" title="Edit Data Keluarga" 
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="/tatausaha/data/keluarga/{{ $keluarga['no_kk'] }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Keluarga" href="#"
                                            class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $keluargas->links() }}
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
        $(document).ready(function() {
            $('#list').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ Data Keluarga per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada Keluarga yang dapat ditampilkan",
                    "infoFiltered": "(dari _MAX_ total keluarga)",
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