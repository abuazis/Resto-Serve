@extends('layouts.app') 
    @section('title', 'Menu | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/menu.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3">
                <h1 class="fas fa-hamburger ml-4"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Menu Tab</h3>
                <form action="" method="get" class="d-inline-block cari mr-4">
                    <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                    <button class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row mx-auto no-gutters">
            <div class="category-bar w-100 bg-white mb-3 mr-3 rounded">
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
        <div class="row mx-auto">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="modal fade mx-auto" id="exampleModalMenu" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-default" id="exampleModalLabel">Detail Menu</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <center>
                                            <img src="{{asset('img/pizza-buah.png')}}" class="border-salmon" alt="">
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="font-default font-weight-bold">Splitza Classic</h1>
                                        <h2
                                            class="bg-salmon text-white price d-inline-block font-default pl-2 pr-2 rounded mt-1">
                                            Rp. 150.900</h2>
                                        <p class="font-default mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Beatae quia ad quos odio ducimus magni atque tenetur</p>
                                        <div class="row mt-5">
                                            <div class="col-md-5">
                                                <button class="btn btn-danger btn-block font-default btn-deletes">
                                                    Hapus
                                                </button>
                                            </div>
                                            <div class="col-md-5">
                                                <button class="btn btn-light border-dark btn-block font-default ubah"
                                                    data-toggle="modal" data-target="#exampleModalEdit">
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 tab-last col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad tab-last">
                <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                    <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                </a>
                <div class="harga-menu font-default ml-3 pl-3 font-weight-bold">Rp. 150.000</div>
                <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">Splitza Classic</div>
            </div>
        </div>
        <div class="row mx-auto mb-5 d-flex ">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Insert New Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Kategori" class="font-default">Nama Kategori</label><br>
                                                <select name="kategori" id="kategori" class="w-100">
                                                    <option value="">--- Select Category ----</option>
                                                    <option value="">Pizza</option>
                                                    <option value="">Pasta</option>
                                                    <option value="">Dessert</option>
                                                    <option value="">Chicken</option>
                                                    <option value="">Drink</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Status" class="font-default">Status Menu</label><br>
                                                <select name="status" id="status" class="w-100">
                                                    <option value="">--- Select Status ----</option>
                                                    <option value="">Tersedia</option>
                                                    <option value="">Tidak tersedia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Nama" class="font-default">Nama Menu</label><br>
                                                <input type="text" name="nama" id="nama" class="w-100"
                                                    placeholder="Masukan Nama Menu">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Harga" class="font-default">Harga Menu</label><br>
                                                <input type="text" name="harga" id="harga" class="w-100"
                                                    placeholder="Masukan Harga Menu">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Deskripsi" class="font-default">Deskripsi Menu</label><br>
                                                <textarea name="Deskripsi" id="Deskripsi" class="w-100" cols="50"
                                                    placeholder="Deskripsikan Menu"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input font-default"
                                                    id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Choose Menu
                                                    Picture</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary font-default"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-salmon text-white font-default">Save Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Edit New Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Kategori" class="font-default">Nama Kategori</label><br>
                                                <select name="kategori" id="kategori" class="w-100">
                                                    <option value="">--- Select Category ----</option>
                                                    <option value="">Pizza</option>
                                                    <option value="">Pasta</option>
                                                    <option value="">Dessert</option>
                                                    <option value="">Chicken</option>
                                                    <option value="">Drink</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Status" class="font-default">Status Menu</label><br>
                                                <select name="status" id="status" class="w-100">
                                                    <option value="">--- Select Status ----</option>
                                                    <option value="">Tersedia</option>
                                                    <option value="">Tidak tersedia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Nama" class="font-default">Nama Menu</label><br>
                                                <input type="text" name="nama" id="nama" class="w-100"
                                                    placeholder="Masukan Nama Menu">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Harga" class="font-default">Harga Menu</label><br>
                                                <input type="text" name="harga" id="harga" class="w-100"
                                                    placeholder="Masukan Harga Menu">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Deskripsi" class="font-default">Deskripsi Menu</label><br>
                                                <textarea name="Deskripsi" id="Deskripsi" class="w-100" cols="50"
                                                    placeholder="Deskripsikan Menu"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input font-default"
                                                    id="validatedCustomFile" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Choose Menu
                                                    Picture</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary font-default"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-salmon text-white font-default">Save Menu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="Page navigation example">
                    <div class="text-center">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-danger btn-lg font-default ml-3 float-right new-btn" data-toggle="modal"
                    data-target="#exampleModal">
                    New Menu +
                </button>
            </div>
        </div>
    @endsection