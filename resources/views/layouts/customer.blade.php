<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('custom/customer.css')}}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Fonts External -->
  <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Italiana&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&display=swap" rel="stylesheet">

  <!-- Icon -->
  <link rel="icon" href="{{asset('img/icon.png')}}">
  <script src="https://kit.fontawesome.com/7a87ef3e19.js"></script>

  <title>RestoServe | All Presented In Deliciousness</title>
</head>

<body>
  <section id="header">
    <div class="fluid-container">
      <div class="tranparent-back">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black pt-4 pb-3 fixed-top">
          <a href="/">
            <img src="{{asset('img/logo.png')}}" class="ml-5 logo" width="200px" height="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-5">
                <a class="nav-link" href="/customer/menu">Menu</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link" href="/customer/order">Order</a>
              </li>
              <li class="nav-item mr-5">
                <i class="fas fa-shopping-cart text-white"></i>
                <a class="nav-link d-inline-block pl-0 pr-0" href="/customer/cart">
                    Cart
                </a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link d-inline-block pl-0 pr-0" href="/customer/user">
                    <h5><i class="fas fa-sign-out-alt"></i></h5>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </section>

  @yield('content')

  <footer id="footer">
    <div class="fluid-container">
      <div class="container-footer">
        <div class="container">
          <div class="row pt-5 text-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
              <img src="{{asset('img/twitter.png')}}" alt="">
            </div>
            <div class="col-sm-2">
              <img src="{{asset('img/facebook.png')}}" alt="">
            </div>
            <div class="col-sm-2">
              <img src="{{asset('img/youtube.png')}}" alt="">
            </div>
            <div class="col-sm-2">
              <img src="{{asset('img/ig.png')}}" width="60" alt="">
            </div>
          </div>
          <div class="row mt-5">
            <p class="font-default d-inline-block mx-auto text-white text-center">© 2016 KFCKU.com by PT RESTOSERVE Indonesia Tbk. |
              All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.imgcheckbox.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
