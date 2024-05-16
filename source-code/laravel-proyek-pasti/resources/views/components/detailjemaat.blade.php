<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>No NIK</td>
                        <td>{{ $jemaat['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $jemaat['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>{{ $jemaat['no_telepon'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $jemaat['jenis_kelamin'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $jemaat['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $jemaat['status_gereja'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td>{{ $jemaat['status_pernikahan'] }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $jemaat['tempat_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Baptis</td>
                        <td>{{ $jemaat['baptis'] }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Sidi</td>
                        <td>{{ $jemaat['sidi'] }}</td>
                    </tr>
                    <tr>
                        <td>Sektor</td>
                        <td> {{ $jemaat['sektor']->nama }}</td>
                    </tr>
                    <tr>
                        <td>Sektor Role</td>
                        <td>{{ $jemaat['sektor_role'] }}</td>
                    </tr>
                    </tr>
                    @foreach ($lampiran as $l)
                        <tr>
                            <td>Lampiran</td>
                            <td>
                                <a href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12">
                @if ($jemaat['baptis'] == 'Ya')
                    <!-- Detail Baptis -->
                    <h3 class="fs-3 fw-bold">Detail Baptis</h3>
                    <table class="mt-4 table">
                        <tr>
                            <td>Tanggal Baptis</td>
                            <td>{{ $baptis['tgl_baptis'] }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pendeta</td>
                            <td>{{ $baptis['nama_pendeta_baptis'] }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Surat Baptis</td>
                            <td>{{ $baptis['no_surat_baptis'] }}</td>
                        </tr>
                        @foreach ($file_surat_baptis as $l)
                            <tr>
                                <td>Lampiran</td>
                                <td>
                                    <a
                                        href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif

                @if ($jemaat['sidi'] == 'Ya')
                    <!-- Detail Sidi -->
                    <h3 class="fs-3 fw-bold">Detail Sidi</h3>
                    <table class="mt-4 table">
                        <tr>
                            <td>Tanggal Sidi</td>
                            <td>{{ $sidi['tgl_sidi'] }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pendeta</td>
                            <td>{{ $sidi['nama_pendeta_sidi'] }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Surat Sidi</td>
                            <td>{{ $sidi['no_surat_sidi'] }}</td>
                        </tr>
                        @foreach ($file_surat_sidi as $l)
                            <tr>
                                <td>Lampiran</td>
                                <td>
                                    <a
                                        href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
