@extends('Fe/template.header')
@section('title', 'Renungan Harian')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    
@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
            <section class="mb-5">
            <div class="container mt-4">
  <div class="row">
    <div class="col-12">
    <h2 class="text border-bottom text-center">Detail Renungan Harian</h2>
    <br>
    <div class="row">
            @foreach ($renungan as $item)
                <div class="mb-3">
                    <div class="card animate-up shadow">
                        <div class="row">
                            <div class="ml-3 text-left">
                            <p>Tanggal : {{ $item->tanggal }}</p>
                            </div>
                        <div class="card-body text-center">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->ayat }}</p>
                                <p>"{{ $item->isi }}"</p>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
      
        </div>
        <div class="col"></div>
   
        </div>
        </div>
</div>
            
            @endsection
    </section>
            
            @endsection

