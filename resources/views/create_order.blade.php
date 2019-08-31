@extends('layouts.app') 
    @section('title', 'Order | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/menu.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3">
                <h1 class="fas fa-pizza-slice ml-4"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Order Tab</h3>
                <form action="" method="get" class="d-inline-block cari mr-4">
                    <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                    <button class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row mx-auto d-inline-block d-flex">
            <div class="col-xl-12 pl-0">
                <div class="row mx-auto">
                    <div class="category-bar w-100 bg-white mb-3 rounded shadow">
                        <ul class="nav justify-content-center font-default">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pizza</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pasta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Chicken</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dessert</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Drink</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-4">
            <div class="row mt-3">
                <div class="col-xl-6 overflow-auto select-menu pl-0">
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                        <div class="col-md-4">
                            <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                                <img src="{{asset('img/pizza-buah.png')}}" class="tab-order w-100 shadow" alt="">
                            </a>
                            <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                            <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row mx-auto mt-2 col-action">
                        <div class="col-12 pl-0 pr-0">
                            <a data-toggle="modal" data-target="#exampleModalDetail"
                                class="btn-lg btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                SHOW CART
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mx-auto mt-2">
                        <div class="col-sm-6 pl-0">
                            <a href="order.html"
                                class="btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                LIST ORDER
                            </a>
                        </div>
                        <div class="col-sm-6 pr-0 last-action">
                            <a href="create_order.html"
                                class="btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                CREATE ORDER
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-form bg-white w-100 ml-3 mr-3 rounded p-4 shadow">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="Nama" class="font-default">Nama Pelanggan</label><br>
                                    <input type="text" name="nama" id="nama" class="w-100"
                                        placeholder="Masukan Nama Menu">
                                </div>
                                <div class="form-group">
                                    <label for="Status" class="font-default">Status Menu</label><br>
                                    <select name="status" id="status" class="w-100">
                                        <option value="">--- No Meja ----</option>
                                        <option value="">01</option>
                                        <option value="">02</option>
                                        <option value="">03</option>
                                        <option value="">04</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi" class="font-default">Keterangan Order</label><br>
                                    <textarea name="Deskripsi" id="Deskripsi" class="w-100" cols="50"
                                        placeholder="Masukan Keterangan Order"></textarea>
                                </div>
                                <button type="button" class="btn btn-block bg-salmon text-white font-default">Save
                                    Menu</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModalDetail" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-default" id="exampleModalLabel">
                                        Your Cart
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row mx-auto">
                                        <div class="col-3">
                                            <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                class="border-salmon img-fluid" alt="">
                                        </div>
                                        <div class="col-4 col-sm-5 d-flex align-items-center">
                                            <h5 class="font-default">Splitza Classic</h5>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <h5 class="font-default">2x</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center text-right">
                                            <h5 class="font-default font-weight-bold">150.900</h5>
                                        </div>
                                    </div>
                                    <div class="row mx-auto mt-1">
                                        <div class="col-3">
                                            <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                class="border-salmon img-fluid" alt="">
                                        </div>
                                        <div class="col-4 col-sm-5 d-flex align-items-center">
                                            <h5 class="font-default">Splitza Classic</h5>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <h5 class="font-default">1x</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center text-right">
                                            <h5 class="font-default font-weight-bold">150.900</h5>
                                        </div>
                                    </div>
                                    <div class="row mx-auto mt-1">
                                        <div class="col-3">
                                            <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                class="border-salmon img-fluid" alt="">
                                        </div>
                                        <div class="col-4 col-sm-5 d-flex align-items-center">
                                            <h5 class="font-default">Splitza Classic</h5>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <h5 class="font-default">1x</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center text-right">
                                            <h5 class="font-default font-weight-bold">150.900</h5>
                                        </div>
                                    </div>
                                    <div class="row mx-auto mt-1">
                                        <div class="col-3">
                                            <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                class="border-salmon img-fluid" alt="">
                                        </div>
                                        <div class="col-4 col-sm-5 d-flex align-items-center">
                                            <h5 class="font-default">Splitza Classic</h5>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <h5 class="font-default">1x</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center text-right">
                                            <h5 class="font-default font-weight-bold">150.900</h5>
                                        </div>
                                    </div>
                                    <div class="row mx-auto mt-3">
                                        <div class="col-md-12">
                                            <h4 class="font-default text-center">Total Pembayaran</h4>
                                            <h2 class="font-default text-center font-weight-bold">Rp. 301.900</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection