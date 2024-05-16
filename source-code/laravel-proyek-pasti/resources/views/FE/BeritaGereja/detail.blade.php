@extends('Fe/template.header')
@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda')

@section('content')

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
            <section class="mb-5">
            <div class="container mt-4">
  <div class="row">
    <div class="col-12">
    <h2 class="text border-bottom text-center">Detail Berita Gereja</h2>
    <br>
    <div class="row">
            @foreach ($warta_jemaat as $item)
                <div class="mb-3">
                    <div class="card animate-up shadow">
                        <div class="card-body text-center">
                                <img alt="" class="img-responsive img-fluid rounded mb-3" width="100" src="{{ asset('storage/' .$item->lampiran.'') }}">&nbsp;
                                <p>{{ $item->tanggal }}</p>
                                <h4>{{ $item->nama }}</h4>
                                <p>{{ $item->isi }}</p>
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

