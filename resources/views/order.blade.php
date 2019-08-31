@extends('layouts.app') 
    @section('title', 'Order | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/order.css')}}">
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
        <div class="row mx-auto mt-2">
            <a href="order.html"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST ORDER
            </a>
            <a href="create_order.html"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                CREATE ORDER
            </a>
        </div>
        <div class="row mt-4 ml-1 mr-3">
            <div class="table-responsive">
                <table class="table font-default rounded text-center">
                    <thead class="bg-salmon text-white">
                        <tr>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Waktu Order</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wahid Hasyim</td>
                            <td>07B</td>
                            <td>10:09:07 WIB</td>
                            <td>-</td>
                            <td><span class="badge badge-success">Sudah Dibayar</span></td>
                            <td>
                                <a href="create_order.html" class="btn btn-sm btn-primary shadow mb-2"><i
                                        class="fas fa-pen"></i></a>
                                <button class="btn btn-sm btn-light shadow mb-2" data-toggle="modal"
                                    data-target="#exampleModalMenu"><i class="fas fa-info-circle"></i></button>
                                <button class="btn btn-sm btn-danger shadow btn-deletes mb-2"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                            <div class="modal fade" id="exampleModalMenu" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-default" id="exampleModalLabel">Detail Menu</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mx-auto">
                                                <div class="col-3">
                                                    <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                        class="border-salmon img-fluid" alt="">
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                        class="border-salmon img-fluid" alt="">
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                        class="border-salmon img-fluid" alt="">
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{asset('img/pizza-buah.png')}}" width="80"
                                                        class="border-salmon img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="container pt-4 pb-4">
                                                <h5 class="font-default font-weight-bold d-inline">Nama
                                                    Pelanggan</h5>
                                                <p class="font-default">Wahid Hasyim</p>
                                                <h5 class="font-default font-weight-bold d-inline">No Meja</h5>
                                                <p class="font-default">07B</p>
                                                <h5 class="font-default font-weight-bold d-inline">Waktu Order</h5>
                                                <p class="font-default">10:08:10 WIB</p>
                                                <h5 class="font-default font-weight-bold d-inline">Keterangan</h5>
                                                <p class="font-default">-</p>
                                                <h5 class="font-default font-weight-bold d-inline">Status Bayar</h5><br>
                                                <span class="badge badge-success font-default">Sudah Dibayar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection