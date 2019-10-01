@extends('layouts.customer')
    @section('content')
        <header id="content" class="mt-5" style="height: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="w-100 bg-dark mt-5 border border-black rounded">
                            <ul class="nav d-flex justify-content-around">
                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/customer/menu/'.$category->nama_kategori) }}"><i class="{{$category->icon}}"></i> {{$category->nama_kategori}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto pt-5 font-default">
                    @foreach ($menus as $menu)
                        <div class="col-lg-6 mb-4">
                            <div class="card mb-3 bg-dark text-white" style="min-height: 219.91px; box-shadow: 0px 0px 8px 1px #aaa">
                                <div class="row no-gutters">
                                    <div class="col-md-5">
                                        <img src="{{asset('uploads/'.$menu->gambar)}}" class="card-img" alt="..." style="min-height: 219.91px;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold mb-2">{{$menu->nama_menu}}</h5>
                                            <h5><span class="badge badge-danger">Rp. {{number_format($menu->harga, 0, ',', '.')}} </span></h5>
                                            <p class="card-text" style="font-size: 15px;">{{$menu->deskripsi}}</p>
                                            <a href="{{ url('/cart/add/'.$menu->id) }}" class="btn btn-sm btn-danger float-right mb-2 mb-xl-0"><i class="fas fa-cart-plus"></i> Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </header>
    @endsection
