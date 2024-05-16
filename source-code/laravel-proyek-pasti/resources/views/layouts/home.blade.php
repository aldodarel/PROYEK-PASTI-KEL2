<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style/home-global.css') }}">
    <link rel="stylesheet" href="@yield('style')">
    <title>GKPI TARUTUNG - @yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <div id="sidebar" class="sidebar shadow-sm">
            {{-- <button id="sidebarclose" class="btn-close-1">
                <i class="fa fa-times"></i>
            </button> --}}
            <div class="logo d-flex flex-row align-items-center gap-4 mb-4">
                <a href="{{ route('home.index') }}"><img class="img-dashboard" src="{{ asset('img/icon.png') }}"
                        alt=""></a>
                <b style="font-size: 16px; border-bottom: 3px;" class="align-middle title">GKPI JEMAAT KHUSUS PASAR
                    SIPOHOLON</b>
            </div>
            @foreach ($navbars as $navbar)
                @if (!$navbar['isGroup'])
                    <a href="{{ $navbar['url'] }}"
                        class="col-12 gap-2 navbar-item d-flex align-items-center {{ explode('?', $_SERVER['REQUEST_URI'])[0] === $navbar['url'] ? 'active shadow-sm' : '' }}">
                        {!! $navbar['icon'] !!}
                        <span>{{ $navbar['name'] }}</span>
                    </a>
                @else
                    <div class="col-12 navbar-group">
                        <span><strong style="font-size: 17px;">{{ $navbar['name'] }}</strong></span>
                        @foreach ($navbar['navbars'] as $child)
                            <a href="{{ $child['url'] }}"
                                class="d-flex gap-2 navbar-item align-items-center col-12 {{ explode('?', $_SERVER['REQUEST_URI'])[0] === $child['url'] ? 'active shadow-sm' : '' }}">
                                {!! $child['icon'] !!}
                                <span>{{ $child['name'] }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
        <div class="content">
            <div class="content-navbar shadow d-flex align-items-center px-3">
                <button class="btn btn-navbar fs-3" id="sidebaropen"><i class="fa fa-bars"></i></button>
                <h3>@yield('page_name')</h3>

                <div class="dropdown ms-auto navbar-logout">
                    <button class="btn dropdown-toggle d-flex align-items-center gap-3" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle" src=" {{-- {{ asset(StaticVariable::$user->profile) }} --}}" alt="">
                        {{-- {{ StaticVariable::$user->name }} --}}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{-- /pendeta/{{StaticVariable::$user->nik}}/profile --}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <i class="fa fa-sign-out"></i>
                            Keluar
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-body p-3">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://use.fontawesome.com/cdd28e0189.js"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="@yield('script')"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @yield('grafik')
</body>

</html>
