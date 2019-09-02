<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    @yield('css')

    <!-- Fonts External -->
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Italiana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="{{asset('img/icon.png')}}">
    <script src="https://kit.fontawesome.com/7a87ef3e19.js"></script>

    <title>@yield('title')</title>
</head>

<body>

    <div class="container-fluid pl-0">
        @include('layouts.includes._sidebar')

        @yield('content-dashboard')
    </div>

    <div class="container-menu pt-3">
        @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom/script.js')}}"></script>
    <script src="{{asset('chart/chart.js/dist/Chart.js')}}"></script>
    <script src="{{asset('chart/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('custom/chart.js')}}"></script>
    <script src="{{asset('custom/alert.js')}}"></script>

</body>

</html>
