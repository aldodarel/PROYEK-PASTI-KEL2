<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-5">
            <div class="table-responsive-sm">
            <table class="table table-light table-borderless">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Pilihan</th> -->
                            <th scope="col">List Laporan</th>
                            <!-- <th scope="col">Lampiran</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($laporankeuangan as $laporan)
                    
                            <tr>
                                <td><a class="btn btn-secondary" href="#"><i class="bi bi-clipboard2">{{ $laporan-> nama_laporan }}</a></td>
                            </tr>                       
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>