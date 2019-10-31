@extends('layouts.customer')
    @section('content')
        <div id="content" class="mt-5 header-order">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-5 mt-5">
                        @foreach($orders as $order)
                            <div class="card mb-3 bg-dark text-white font-default">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{asset('img/ajwad.jpeg')}}" class="card-img" height="175" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold">{{$order->nama_pelanggan}}</h5>
                                            <p class="card-text" style="font-size: 15px;">{{$order->alamat}}</p>
                                            <p class="card-text d-inline-block"><small class="text-muted">Ordered at {{$order->created_at->diffForHumans()}}</small></p>
                                            <button data-toggle="modal" data-target="#exampleModalMenu{{$order->id}}" class="btn btn-sm btn-success float-right mb-2 mb-xl-0"><i class="fas fa-pizza-slice"></i>  Detail</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="modal fade" id="exampleModalMenu{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Detail Order
                            </h5>
                        </div>
                        <div class="modal-body">
                                @php
                                    $details = App\Models\DetailOrder::where('id_order', $order->id)->get();
                                @endphp
                                @foreach($details as $detail)
                                    <div class="row mx-auto mb-1">
                                        <div class="col-3">
                                            <img src="{{asset('uploads/'.$detail->menu->gambar)}}" width="80"
                                                class="border-salmon img-fluid" alt="">
                                        </div>
                                        <div class="col-4 col-sm-5 d-flex align-items-center">
                                            <h5 class="font-default">{{$detail->menu->nama_menu}}</h5>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <h5 class="font-default">{{$detail->jumlah}}x</h5>
                                        </div>
                                        <div class="col-3 d-flex align-items-center text-right">
                                            <h5 class="font-default font-weight-bold">{{number_format($detail->harga, 0, ',', '.')}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="row mx-auto mt-5">
                                <div class="col-md-12">
                                    <h4 class="font-default text-center">Total Pembayaran</h4>
                                    <h2 class="font-default text-center font-weight-bold">Rp. {{number_format($order->total_pembayaran, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
