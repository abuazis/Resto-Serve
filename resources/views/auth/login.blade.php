@extends('layouts.auth')
    @section('title', 'Login | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/login.css')}}">
    @stop
    @section('content')
        <center>
            <a href="{{ url('/') }}">
                <img src="{{asset('img/logo.png')}}" class="d-inline-block mx-auto" width="200" alt="">
            </a>
        </center>
        <form method="POST" action="{{ route('login') }}" class="ml-5 mr-5 mt-5 mb-5 font-default">
            @csrf
            <div class="form-group">
                <label for="Username" class="text-white">Username</label>
                @error('username')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="username" class="w-100 @error('username') no-valid @enderror" placeholder="Masukan Username Anda" value="{{old('username')}}"/>
            </div>
            <div class="form-group">
                <label for="Password" class="text-white">Password</label>
                @error('password')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" class="w-100 @error('password') no-valid @enderror" placeholder="Masukan Password Anda" value="{{old('username')}}"/>
            </div>
            <div class="custom-control custom-checkbox mt-4 ml-1">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                <label class="custom-control-label text-white" for="remember">Remember Me</label>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="submit mt-3">LOGIN</button>
            </div>
        </form>
        <center>
            <a href="{{ url('/register') }}" class="text-decoration-none text-white font-default text-center mt-5 mr-5">No Have Account?</a>
            @if(Route::has('password.request'))
                <a href="{{ url('/password/reset') }}" class="text-decoration-none text-white font-default text-center mt-5 ml-5">Forgot Password</a>
            @endif
        </center>
    @endsection
