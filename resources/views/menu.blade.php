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
                @if(Request::segment(1) == 'menu')
                    <form action="/menu/result" method="POST" class="d-inline-block cari mr-4">
                        @csrf
                        <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                        <button type="submit" class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mx-auto no-gutters">
            <div class="category-bar w-100 bg-white mb-3 mr-3 rounded">
                <ul class="nav justify-content-center font-default">
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="/menu/{{$category->nama_kategori}}">{{$category->nama_kategori}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row mx-auto">
            @foreach ($menus as $menu)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 col-pad">
                    <a href="" data-toggle="modal" data-target="#exampleModalMenu{{$menu->id}}">
                        <img src="{{asset('img/'.$menu->gambar)}}" class="tab img-fluid shadow" alt="">
                    </a>
                    <div class="modal fade mx-auto modal-detail" id="exampleModalMenu{{$menu->id}}" tabindex="-1" role="dialog"
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
                                                <img src="{{asset('img/'.$menu->gambar)}}" class="border-salmon" alt="">
                                            </center>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 class="font-default font-weight-bold">{{$menu->nama_menu}}</h1>
                                            <h2
                                                class="bg-salmon text-white price d-inline-block font-default pl-2 pr-2 rounded mt-1">
                                                Rp. {{$menu->harga}}</h2>
                                            <p class="font-default mt-2">{{$menu->deskripsi}}</p>
                                            <div class="row mt-5">
                                                <div class="col-md-5">
                                                    <a href="/menu/remove/{{$menu->id}}" class="btn btn-danger btn-block font-default" onclick="return confirm('Are You Sure ?');">
                                                        Hapus
                                                    </a>
                                                </div>
                                                <div class="col-md-5">
                                                    <button class="btn btn-light border-dark btn-block font-default ubah"
                                                        data-toggle="modal" data-target="#exampleModalEdit{{$menu->id}}">
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
                    <div class="harga-menu font-default ml-3 font-weight-bold text-center">Rp. {{$menu->harga}}</div>
                    <div class="judul-menu font-default ml-3 text-center font-weight-bold">{{$menu->nama_menu}}</div>
                </div>
            @endforeach
        </div>
        <div class="row mx-auto">
            {{-- @foreach ($menus as $menu)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad">
                    <a href="" data-toggle="modal" data-target="#exampleModalMenu">
                        <img src="{{asset('img/pizza-buah.png')}}" class="tab img-fluid shadow" alt="">
                    </a>
                    <div class="harga-menu font-default ml-3 font-weight-bold text-center">Rp. {{$menu->harga}}</div>
                    <div class="judul-menu font-default ml-3 pl-3 font-weight-bold">{{$menu->nama_menu}}</div>
                </div>
            @endforeach --}}
            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-pad">
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
            </div> --}}
        </div>
        <div class="row mx-auto mb-5 d-flex ">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="/menu/store" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title font-default" id="exampleModalLabel">Insert New Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @csrf
                                                    <label for="Kategori" class="font-default">Nama Kategori</label>
                                                    @error('kategori')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <select name="kategori" id="kategori" class="w-100 @error('kategori') no-valid @enderror">
                                                        <option value="">--- Select Category ----</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}" {{ old('kategori') == $category->id ? 'selected' : '' }}>{{$category->nama_kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Status" class="font-default">Status Menu</label>
                                                    @error('status')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <select name="status" id="status" class="w-100 @error('status') no-valid @enderror">
                                                        <option value="">--- Select Status ----</option>
                                                        <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                        <option value="Tidak Tersedia" {{ old('status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Nama" class="font-default">Nama Menu</label>
                                                    @error('nama')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <input type="text" name="nama" id="nama" class="w-100 @error('nama') no-valid @enderror"
                                                        placeholder="Masukan Nama Menu" value="{{old('nama')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Harga" class="font-default">Harga Menu</label>
                                                    @error('harga')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <input type="text" name="harga" id="harga" class="w-100 @error('harga') no-valid @enderror"
                                                        placeholder="Masukan Harga Menu" value="{{old('harga')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Deskripsi" class="font-default">Deskripsi Menu</label>
                                                    @error('deskripsi')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <textarea name="deskripsi" id="deskripsi" class="w-100 @error('deskripsi') no-valid @enderror" cols="50"
                                                        placeholder="Deskripsikan Menu">{{old('deskripsi')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                @error('gambar')
                                                    <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                @enderror
                                                <div class="custom-file">
                                                    <input type="file" name="gambar" class="custom-file-input font-default"
                                                        id="validatedCustomFile">
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose Menu
                                                        Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary font-default"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-salmon text-white font-default">Save Menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach($menus as $menu)
                <div class="modal fade" id="exampleModalEdit{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="/menu/update/{{$menu->id}}" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title font-default" id="exampleModalLabel">Edit Data Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        @csrf
                                                        <label for="Kategori" class="font-default">Nama Kategori</label>
                                                        @error('kategori')
                                                            <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                        <select name="kategori" id="kategori" class="w-100 @error('kategori') no-valid @enderror">
                                                            <option value="">--- Select Category ----</option>
                                                            @foreach ($types as $type)
                                                                <option value="{{$type->id}}" @if($type->id == $menu->id_kategori) selected @endif>{{$type->nama_kategori}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Status" class="font-default">Status Menu</label>
                                                        @error('status')
                                                            <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                        <select name="status" id="status" class="w-100 @error('status') no-valid @enderror">
                                                            <option value="">--- Select Status ----</option>
                                                            <option value="Tersedia" @if($menu->status_menu == 'Tersedia') selected @endif>Tersedia</option>
                                                            <option value="Tidak Tersedia" @if($menu->status_menu == 'Tidak Tersedia') selected @endif>Tidak tersedia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Nama" class="font-default">Nama Menu</label>
                                                        @error('nama')
                                                            <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                        <input type="text" name="nama" id="nama" class="w-100 @error('nama') no-valid @enderror"
                                                            placeholder="Masukan Nama Menu" value="{{$menu->nama_menu}}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Harga" class="font-default">Harga Menu</label>
                                                        @error('harga')
                                                            <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                        <input type="text" name="harga" id="harga" class="w-100 @error('harga') no-valid @enderror"
                                                            placeholder="Masukan Harga Menu" value="{{$menu->harga}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="Deskripsi" class="font-default">Deskripsi Menu</label>
                                                        @error('deskripsi')
                                                            <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                        <textarea name="deskripsi" id="deskripsi" class="w-100 @error('deskripsi') no-valid @enderror" cols="50"
                                                            placeholder="Deskripsikan Menu">{{$menu->deskripsi}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    @error('gambar')
                                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar" class="custom-file-input font-default"
                                                            id="validatedCustomFile">
                                                        <label class="custom-file-label" for="validatedCustomFile">Choose Menu
                                                            Picture</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary font-default"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-salmon text-white font-default">Save Menu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-6">
                {{ $menus->links() }}
            </div>
            <div class="col-sm-6">
                <button class="btn btn-danger btn-lg font-default ml-3 float-right new-btn" data-toggle="modal"
                    data-target="#exampleModal">
                    New Menu +
                </button>
            </div>
        </div>
    @endsection
