<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @yield('css')

    <!-- Fonts External -->
    <link href="{{asset('fonts/Bubblegum_Sans/BubblegumSans-Regular.ttf')}}" rel="stylesheet">
    <link href="{{asset('fonts/Italiana/Italiana-Regular.ttf')}}" rel="stylesheet">
    <link href="{{asset('fonts/Montserrat/Montserrat-Medium.ttf')}}" rel="stylesheet">
    <link href="{{asset('fonts/Montserrat/Montserrat-SemiBold.ttf')}}" rel="stylesheet">
    <link href="{{asset('fonts/Montserrat/Montserrat-Bold.ttf')}}" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="{{asset('img/icon.png')}}">

    <title>@yield('title')</title>
</head>

<body>
    {{-- Main Content --}}
    <div class="container-login pt-5">
        @yield('content')
    </div>
    {{-- End Main Content --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
