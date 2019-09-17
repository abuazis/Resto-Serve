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
                @if(Request::segment(1) == 'menu')
                    <form action="/menu/result" method="POST" class="d-inline-block cari mr-4">
                        @csrf
                        <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                        <button type="submit" class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mx-auto d-inline-block d-flex">
            <div class="col-xl-12 pl-0">
                <div class="row mx-auto">
                    <div class="category-bar w-100 bg-white mb-3 rounded shadow">
                        <ul class="nav justify-content-center font-default">
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="/order/create/{{$category->nama_kategori}}">{{$category->nama_kategori}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-4">
            <div class="row mt-3">
                <div class="col-xl-6 overflow-auto select-menu pl-0">
                    <div class="row mx-auto">
                        @foreach($menus as $menu)
                            <div class="col-md-4 item">
                                <a href="/cart/add/{{$menu->id}}" class="add-to-cart">
                                    <img src="{{asset('img/'.$menu->gambar)}}" class="tab-order w-100 shadow" alt="">
                                </a>
                                <div class="harga-menu font-default ml-3 text-center font-weight-bold">Rp. {{number_format($menu->harga, 0, ',', '.')}}</div>
                                <div class="judul-menu font-default ml-3 text-center font-weight-bold">{{$menu->nama_menu}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row mx-auto mt-2 col-action">
                        <div class="col-12 pl-0 pr-0">
                            <a data-toggle="modal" data-target="#exampleModalDetail"
                                class="btn-lg btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                SHOW CART
                                <i class="fas fa-shopping-cart shopping-cart"></i>
                                @if($quantity > 0)
                                    <span class="badge badge-pill badge-danger font-default">{{$quantity}}</span>
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="row mx-auto mt-2">
                        <div class="col-sm-6 pl-0">
                            <a href="/order"
                                class="btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                LIST ORDER
                            </a>
                        </div>
                        <div class="col-sm-6 pr-0 last-action">
                            <a href="/order/create"
                                class="btn-block bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                                CREATE ORDER
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-form bg-white w-100 ml-3 mr-3 rounded p-4 shadow">
                            <form action="/order/store" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Nama" class="font-default">Nama Pelanggan</label>
                                    @error('nama')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <input type="text" name="nama" class="w-100 @error('nama') no-valid @enderror" id="nama" class="w-100"
                                        placeholder="Masukan Nama Pelanggan" value="{{old('nama')}}">
                                </div>
                                <div class="form-group">
                                    <label for="Meja" class="font-default">No Meja</label>
                                    @error('meja')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <select name="meja" id="meja" class="w-100 @error('meja') no-valid @enderror">
                                        <option>--- No Meja ----</option>
                                        <option value="01" {{ old('meja') == '01' ? 'selected' : '' }}>01</option>
                                        <option value="02" {{ old('meja') == '02' ? 'selected' : '' }}>02</option>
                                        <option value="03" {{ old('meja') == '03' ? 'selected' : '' }}>03</option>
                                        <option value="04" {{ old('meja') == '04' ? 'selected' : '' }}>04</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Keterangan" class="font-default">Keterangan Order</label>
                                    @error('keterangan')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <textarea name="keterangan" id="Keterangan" class="w-100 @error('keterangan') no-valid @enderror" cols="50"
                                        placeholder="Masukan Keterangan Order">{{old('keterangan')}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-block bg-salmon text-white font-default font-weight-bold">Create
                                    Order</button>
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
                                    @foreach($items as $item)
                                        <div class="row mx-auto mt-1">
                                            <div class="col-3">
                                                <img src="{{asset('img/'.$item->attributes->picture)}}" width="80"
                                                    class="border-salmon img-fluid" alt="">
                                            </div>
                                            <div class="col-sm-4 d-flex pr-0 align-items-center">
                                                <h6 class="font-default">{{$item->name}}</h6>
                                            </div>
                                            <div class="col-1 d-flex align-items-center p-0 justify-content-center">
                                                <h5 class="font-default font-weight-bold text-danger">{{$item->quantity}}x</h5>
                                            </div>
                                            <div class="col-3 d-flex align-items-center font-default">
                                                <h5 class="font-weight-bold"> &nbsp;{{number_format($item->price * $item->quantity, 0, ',', '.')}}</h5>
                                            </div>
                                            <div class="col-1 d-flex align-items-center text-right font-default">
                                                <a href="/cart/remove/{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row mx-auto mt-3">
                                        <div class="col-md-12">
                                            <h4 class="font-default text-center">Total Pembayaran</h4>
                                            <h2 class="font-default text-center font-weight-bold">Rp. {{number_format($total, 0, ',', '.')}}</h2>
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
