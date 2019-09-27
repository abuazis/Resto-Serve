<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('custom/index.css')}}">
  <link href="{{ asset('aos/aos.css') }}" rel="stylesheet">

  <!-- Fonts External -->
  <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Italiana&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&display=swap" rel="stylesheet">

  <!-- Icon -->
  <link rel="icon" href="{{asset('img/icon.png')}}">

  <title>RestoServe | All Presented In Deliciousness</title>
</head>

<body>
  <header>
    <div class="fluid-container">
      <div class="tranparent-back">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent pt-4 pb-3 fixed-top">
          <a href="">
            <img src="{{asset('img/logo.png')}}" class="ml-5 logo" width="200px" height="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-5">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link" href="#about">About Us</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link" href="#promo">Hot Promo</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link" href="#category">Our Category</a>
              </li>
              <li class="nav-item mr-5">
                <a class="nav-link" href="#footer">Contact Us</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container-banner">
          <h1 class="title-resto text-center">RestoServe</h1>
          <p class="text-center">Everything is presented in deliciousness</p>
          <div class="d-flex align-items-center justify-content-center mt-4">
              @if(!Auth::user())
                <a href="/login">
                  <button class="btn-login mr-4 log">LOGIN</button>
                </a>
                <a href="/register">
                  <button class="btn-login ml-4 reg">REGISTRASI</button>
                </a>
              @else
                <a href="/dashboard">
                  <button class="btn-login mr-4 log">MY DASHBOARD</button>
                </a>
              @endif
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="about">
    <div class="fluid-container">
      <div class="container-about">
        <img class="brush" src="{{asset('img/brush.png')}}" alt="">
        <h1 class="font-weight-bold text-center">ABOUT US</h1><br>
        <div class="container pb-5">
          <div class="row mt-4">
            <div class="col-md-6 d-flex align-items-center">
              <p class="font-default float-left text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Omnis magni ut, odit,
                quibusdam accusantium id sapiente earum voluptates, doloribus perferendis exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt! Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Omnis magni ut, odit,
                quibusdam accusantium id sapiente earum voluptates, doloribus perferendis exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt! doloribus perferendis
                exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt! </p>
            </div>
            <div class="col-md-6">
              <center>
                <img src="{{asset('img/pizza-rught.png')}}" class="d-inline-block mx-auto" width="250" alt="" data-aos="fade-left" data-aos-easing="linear" data-duration="5000">
              </center>
            </div>
          </div>
          <div class="row mb-5 mt-5">
            <div class="col-md-6">
              <center>
                <img src="{{asset('img/pizza-left.png')}}" class="d-inline-block mx-auto" width="250" alt="" data-aos="fade-right" data-aos-easing="linear" data-duration="5000">
              </center>
            </div>
            <div class="col-md-6">
              <p class="font-default float-right text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Omnis magni ut, odit,
                quibusdam accusantium id sapiente earum voluptates, doloribus perferendis exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt! Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Omnis magni ut, odit,
                quibusdam accusantium id sapiente earum voluptates, doloribus perferendis exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt! doloribus perferendis
                exercitationem
                illo repudiandae excepturi cum perspiciatis minima minus nobis sunt!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="promo">
    <div class="fluid-container">
      <div class="container-promo">
        <div class="layer pt-5 pb-5">
          <h1 class="font-weight-bold text-center mt-3">HOT PROMO</h1>
          <div class="row mt-5 pt-3">
            <div class="col-md-4 text-center mb-5" data-aos="fade-right" data-aos-easing="linear" data-duration="3000">
              <img src="{{asset('img/Group 6.png')}}" alt="">
              <h2 class="judul">Honey Chicken<br> Signature</h2>
              <h2 class="harga">Rp. 70.800</h2>
              <a href="/order">
                <button class="mt-3">ORDER NOW</button>
              </a>
            </div>
            <div class="col-md-4 text-center mb-5" data-aos="fade-down" data-aos-easing="linear" data-duration="4000">
              <img src="{{asset('img/Group 6.png')}}" alt="">
              <h2 class="judul">Honey Chicken<br> Signature</h2>
              <h2 class="harga">Rp. 70.800</h2>
              <a href="/order">
                <button class="mt-3">ORDER NOW</button>
              </a>
            </div>
            <div class="col-md-4 text-center mb-5" data-aos="fade-left" data-aos-easing="linear" data-duration="3000">
              <img src="{{asset('img/Group 6.png')}}" alt="">
              <h2 class="judul">Honey Chicken<br> Signature</h2>
              <h2 class="harga">Rp. 70.800</h2>
              <a href="/order">
                <button class="mt-3">ORDER NOW</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="category">
    <div class="fluid-container">
      <div class="container-category pb-5">

        <h1 class="font-weight-bold text-center mt-5 pt-3 title-category">OUR CATEGORY</h1>
        <div class="row text-center mt-4">
          <div class="col-md-4">
            <img src="{{asset('img/pizza-slice.png')}}" class="mt-3" alt="">
            <h2 class="mt-2 font-default">Pizza</h2>
            <p class="font-default w-75 d-inline-block mx-auto">Semuanya tersaji dalam kelezatan
              yang sempurna dan cita rasa yang tinggi.</p>
          </div>
          <div class="col-md-4">
            <img src="{{asset('img/chicken.png')}}" alt="">
            <h2 class="mt-2 font-default">Chicken</h2>
            <p class="font-default w-75 d-inline-block mx-auto">Semuanya tersaji dalam kelezatan
              yang sempurna dan cita rasa yang tinggi.</p>
          </div>
          <div class="col-md-4">
            <img src="{{asset('img/spaghetti.png')}}" alt="">
            <h2 class="mt-2 font-default">Pasta</h2>
            <p class="font-default w-75 d-inline-block mx-auto">Semuanya tersaji dalam kelezatan
              yang sempurna dan cita rasa yang tinggi.</p>
          </div>
        </div>
        <div class="row text-center mt-3">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <img src="{{asset('img/ice-cream.png')}}" class="mt-3" alt="">
            <h2 class="mt-2 font-default">Dessert</h2>
            <p class="font-default w-75 d-inline-block mx-auto">Semuanya tersaji dalam kelezatan
              yang sempurna dan cita rasa yang tinggi.</p>
          </div>
          <div class="col-md-4">
            <img src="{{asset('img/beer.png')}}" class="mt-3" alt="">
            <h2 class="mt-2 font-default">Drink</h2>
            <p class="font-default w-75 d-inline-block mx-auto">Semuanya tersaji dalam kelezatan
              yang sempurna dan cita rasa yang tinggi.</p>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>

    </div>
    </div>
  </section>

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
  <script src="{{asset('custom/script.js')}}"></script>
  <script src="{{asset('aos/aos.js')}}"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
