@extends('layouts.customer')
    @section('content')
        <header id="content" class="mt-5" style="min-height: 800px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-5 mt-5">
                        <div class="card mb-3 bg-dark text-white font-default">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{asset('img/ajwad.jpeg')}}" class="card-img" height="175" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Customer Name</h5>
                                        <p class="card-text" style="font-size: 15px;">Jalan Kampung Raya Rumah Abu Jl. Kp. Pekayon No.16, RT.003/RW.4, Pekayon Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17148, Indonesia</p>
                                        <p class="card-text d-inline-block"><small class="text-muted">Ordered at 3 mins ago</small></p>
                                        <button data-toggle="modal" data-target="#exampleModalMenu" class="btn btn-sm btn-success float-right mb-2 mb-xl-0"><i class="fas fa-pizza-slice"></i>  Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="modal fade" id="exampleModalMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-default" id="exampleModalLabel">Detail Order
                        </h5>
                    </div>
                    <div class="modal-body">
                            <div class="row mx-auto mb-1">
                                <div class="col-3">
                                    <img src="{{asset('uploads/pizza-buah.png')}}" width="80"
                                        class="border-salmon img-fluid" alt="">
                                </div>
                                <div class="col-4 col-sm-5 d-flex align-items-center">
                                    <h5 class="font-default">Splitza Classic</h5>
                                </div>
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    <h5 class="font-default">2x</h5>
                                </div>
                                <div class="col-3 d-flex align-items-center text-right">
                                    <h5 class="font-default font-weight-bold">300.000</h5>
                                </div>
                            </div>
                        <div class="row mx-auto mt-5">
                            <div class="col-md-12">
                                <h4 class="font-default text-center">Total Pembayaran</h4>
                                <h2 class="font-default text-center font-weight-bold">Rp. 300.000</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
