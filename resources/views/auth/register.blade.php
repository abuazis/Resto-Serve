@extends('layouts.auth')
    @section('title', 'Register | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/registrasi.css')}}">
    @stop
    @section('content')
        <center>
            <a href="/">
                <img src="{{asset('img/logo.png')}}" class="d-inline-block mx-auto" width="200" alt="">
            </a>
        </center>
        <form method="POST" action="{{ route('register') }}" class="ml-5 mr-5 mt-4 font-default">
            @csrf
            <div class="form-group">
                <label for="Username" class="text-white">Username</label>
                @error('username')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="username" class="w-100 @error('username') no-valid @enderror" value="{{old('username')}}" placeholder="Masukan Username Anda" />
            </div>
            <div class="form-group">
                <label for="Email" class="text-white">Email</label>
                @error('email')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="email" class="w-100 @error('email') no-valid @enderror" value="{{old('email')}}" placeholder="Masukan Email Privilege" />
            </div>
            <div class="form-group">
                <label for="Password" class="text-white">Password</label>
                @error('password')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" class="w-100 @error('password') no-valid @enderror" value="{{old('password')}}" placeholder="Masukan Password Anda" />
            </div>
            <div class="form-group">
                <label for="Konfirmasi Password" class="text-white">Konfirmasi Password</label>
                @error('password_confirmation')
                    <span class="text-danger font-weight-light font-label ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="Password" name="password_confirmation" class="w-100 @error('password_confirmation') no-valid @enderror" value="{{old('password_confirmation')}}" placeholder="Masukan Konfirmasi Password Anda" />
            </div>
            <div class="form-group">
                <button type="submit" class="submit mt-3">REGISTRASI</button>
            </div>
        </form>
        <center>
            <a href="/">
                <img src="{{asset('img/back.png')}}" class="mx-auto" alt="">
            </a>
            <br>
            <br>
            <a href="/login" class="text-decoration-none text-white font-default text-center">Have Account?</a>
        </center>
    @endsection
