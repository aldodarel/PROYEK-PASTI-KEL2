<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home6')

@section('style', asset('css/style/pendeta.css'))
@section('title', '')
@section('page_name', 'Data Statistik')
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
                    <div class="col-12 col-md-3 d-flex mt-md-0 mb-4">
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
        <div class="col-12 shadow-sm rounded mt-2 bg-white p-3">
            <div id="chartDesa"></div>
        </div>
@endsection  

@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
            Highcharts.chart('chartDesa', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<b>Data Statistik Jumlah Jemaat Tiap Sektor</b>'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Jemaat</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '<b>Sektor Jemaat</b>',
            data: [{!!json_encode($jemaats->where("sektor_id", "1")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "2")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "3")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "4")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "5")->count())!!}, 
            {!!json_encode($jemaats->where("sektor_id", "6")->count())!!},
            {!!json_encode($jemaats->where("sektor_id", "7")->count())!!}
            ]
        }]
    });
    </script>
@endsection
