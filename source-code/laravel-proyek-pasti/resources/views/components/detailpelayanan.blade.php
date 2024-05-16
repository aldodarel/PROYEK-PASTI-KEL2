<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">

                <table class="mt-4 table">
                    @foreach ($status_pelayanan as $status)
                        <tr>
                            <td>{{ ucfirst($status) }}</td>
                            <td>
                                @foreach ($results[$status] as $result)
                                    {{ $result->jemaat->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="col-12">
                {{-- @if ($jemaat['baptis'] == 'Ya') --}}
                <!-- Detail Baptis -->
                <h3 class="fs-3 fw-bold">Pengumpul Persembahan</h3>
                <table class="mt-4 table">
                    @foreach ($persembahan as $status)
                        <tr>
                            <td>{{ ucfirst($status) }}</td>
                            <td>
                                @foreach ($results_persembahan[$status] as $result)
                                    {{ $result->jemaat->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- @endif --}}

                {{-- @if ($jemaat['sidi'] == 'Ya') --}}
                <!-- Detail Sidi -->
                <h3 class="fs-3 fw-bold">Penerima Tamu</h3>
                <table class="mt-4 table">
                    @foreach ($penerima_tamu as $status)
                        <tr>
                            <td>{{ ucfirst($status) }}</td>
                            <td>
                                @foreach ($results_penerima_tamu[$status] as $result)
                                    {{ $result->jemaat->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{-- @endif --}}
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mt-4">
        <a href="{{ route('pendeta.jadwal') }}" class="btn btn-primary">
            <span>Kembali</span>
        </a>
    </div>
</div>
