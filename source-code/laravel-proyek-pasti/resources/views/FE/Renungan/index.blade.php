@extends('Fe/template.header')
@section('title', 'Renungan Harian')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
            <section class="mb-5">
            <div class="container mt-0">
  <div class="row">
    <div class="col-12">
    <h2 class="text border-bottom text-center">Renungan harian </h2>
    <br>
    <div class="row justify-content-left">
    @foreach ($renungan as $item)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card animate-up shadow">
                    <div class="card-body text-center">
                                <h4 class="text">Tanggal : {{ $item->tanggal }}</h4>
                                <h5 class="text"><strong>{{ $item->ayat }}</strong></h5>
                                <p class="text" style="font-size: 15px;">{{ $item->title }}</p>
                                <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                    <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                                </div>
                               <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                               <a href="/renungan/{{$item->id}}" class="btn btn-primary p-2 ms-auto">
                               <span>Baca Selengkapnya >></span>
                                   </a>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
       

    </section>
            
            @endsection

