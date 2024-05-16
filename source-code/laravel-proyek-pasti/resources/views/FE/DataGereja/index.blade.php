@extends('Fe/template.header')
@section('title', 'Data Gereja')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
<div class="col-12 mt-3 p-3">
    <div class="col-12">
        <div class="row">
        <div class="row">
            <div class="col-md">
                <div class="header-body text-left mt-0 mb-4">
                    <div class="row justify-content">
                        <div class="row col-lg-12 col-md-4 border-bottom">
                            <div class="col-12">
                            <h2 style="text-align: center;" class="tex border-bottom">Data Statistik Jemaat</h2>
                            <br>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</div>
@endsection

