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
    <script src="https://kit.fontawesome.com/7a87ef3e19.js"></script>

    <title>@yield('title')</title>
</head>

<body>
    <div class="container-login d-flex align-items-center">
        <div class="box mx-auto rounded">
            @yield('content')
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom/script.js')}}"></script>

</body>

</html>
