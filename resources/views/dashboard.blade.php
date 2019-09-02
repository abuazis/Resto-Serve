@extends('layouts.app')
    @section('title', 'Dashboard | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/dashboard.css')}}">
    @stop
    @section('content-dashboard')
        <div class="container-menu">
            <div class="row mx-auto ">
                <div class="col-md-6 mb-3">
                    <div class="w-100 bg-white sec-tab shadow ">
                        <center>
                            <a href="/menu">
                                <img src="{{asset('img/menu-pic.png')}}" class="mt-4" width="170" alt="">
                            </a>
                            <h1 class="font-default mt-2">Menu</h1>
                            <p class="font-default">Terdapat 4 menu tersedia sekarang</p>
                        </center>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="w-100 bg-white sec-tab shadow">
                        <center>
                            <a href="/order">
                                <img src="{{asset('img/order-pic.png')}}" class="mt-4" width="170" alt="">
                            </a>
                            <h1 class="font-default mt-2">Order</h1>
                            <p class="font-default">Total 243 orderan untuk bulan ini</p>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-md-6">
                    <div class="w-100 bg-white sec-tab shadow mb-3">
                        <center>
                            <a href="/transaksi">
                                <img src="{{asset('img/transaction-pic.png')}}" class="mt-4" width="170" alt="">
                            </a>
                            <h1 class="font-default mt-2">Transaksi</h1>
                            <p class="font-default">Pemasukan terkini Rp.1.220.900 bulan ini</p>
                        </center>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="w-100 bg-white sec-tab shadow mb-3">
                        <center>
                            <a href="/laporan">
                                <img src="{{asset('img/report-pic.png')}}" class="mt-4" width="170" alt="">
                            </a>
                            <h1 class="font-default mt-2">Laporan</h1>
                            <p class="font-default">Laporan bulan juli sudah tersedia</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    @endsection
