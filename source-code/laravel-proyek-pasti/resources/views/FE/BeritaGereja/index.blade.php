@extends('Fe/template.header')
@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
            <section class="mb-5">
            <div class="container mt-3">
  <div class="row">
    <div class="col-10 col-lg-8">
    <h2 class="text border-bottom ">Berita Terbaru Gereja</h2>
    <br>
    <div class="row">
            @foreach ($warta_jemaat as $item)
                <div class="mb-3">
                    <div class="card animate-up shadow">
                        <div class="card-body ">
                                <img alt="" class="img-responsive img-fluid rounded" width="100" src="{{ asset('storage/' .$item->lampiran.'') }}">&nbsp;{{ $item->nama }}
                                <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                    <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                                </div>
                                <a href="/beritaGereja/{{$item->id}}"   class="btn btn-primary p-2 ms-auto mt-3">
                                 <span>Baca Selengkapnya >></span>
                                   </a>
                              
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
      
        </div>
        <div class="col"></div>
    <div class="col-8 col-lg-3">
    <h2 class="text border-bottom">Jadwal Ibadah</h2>
    <br>
    <div class="row justify-content-center">
            @foreach ($jadwal_ibadah as $item)
                <div class="col-lg-12 mb-3">
                    <div class="card animate-up shadow">
                        <div class="card-body text-center" style="background-color: #e2f1fc;">
                            <h4 class="text">{{ $item->name }}</h4>
                            <p>Tanggal : {{ $item->tanggal }}</p>
                            <p>Jam : {{ $item->waktu }}</p>
                            <p>Dilaksanakan: {{ $item->pengulangan }}</p>
                            <p>Pengkhotbah : {{ $item['pengkhotbah'] }}</p>
                            <div class="mt-3 d-flex justify-content-between text-sm text-muted">
                                <i class="fas fa-clock">Diposting {{ $item->created_at->diffForHumans() }}</i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
       
        </div>
        </div>
        </div>
</div>
            
            @endsection

