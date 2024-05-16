@extends('layouts.boostrap')

@section('style', asset('css/style/login.css'))
@section('title', 'Login')

@section('content')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <div class="login-holder shadow p-5 rounded">
        <div class="login-logo d-flex justify-content-center">
            <a href="{{ route('home.index') }}"><img src="{{ asset('img/icon.png') }}" alt=""></a>
        </div>
        <div class="login-form mt-5">
            <div class="col-12">
                @error("message")
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <form action="" method="post">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="">Username</label>
                        <input type="text" name="nik" id="nik" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3"><strong>Masuk</strong></button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
