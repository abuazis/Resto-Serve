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
                @if(Request::segment(1) == 'menu')
                    <form action="/menu/result" method="POST" class="d-inline-block cari mr-4">
                        @csrf
                        <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                        <button type="submit" class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mx-auto mt-2">
            <a href="/order"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST ORDER
            </a>
            <a href="/order/create"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                CREATE ORDER
            </a>
        </div>
        <div class="row mt-4 ml-1 mr-3">
            <div class="table-responsive">
                <table class="table font-default rounded text-center" id="tableMenu">
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
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->nama_pelanggan}}</td>
                                <td>{{$order->no_meja}}</td>
                                <td>{{$order->waktu_order}}</td>
                                <td>{{$order->keterangan}}</td>
                                <td>
                                    @if($order->status_order == 'Sudah Dibayar')
                                        <span class="badge badge-success">Sudah Dibayar</span>
                                    @else
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <a href="create_order.html" class="btn btn-sm btn-primary shadow mb-2"><i
                                            class="fas fa-pen"></i></a> --}}
                                    <button class="btn btn-sm btn-light shadow mb-2" data-toggle="modal"
                                        data-target="#exampleModalMenu{{$order->id}}"><i class="fas fa-info-circle"></i></button>
                                    <a href="/order/destroy/{{$order->id}}" class="btn btn-sm btn-danger shadow btn-deletes mb-2 text-white"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach($orders as $order)
                    <div class="modal fade" id="exampleModalMenu{{$order->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-default" id="exampleModalLabel">Detail Order</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row mx-auto">
                                        @php
                                            $details = App\Models\DetailOrder::where('id_order', $order->id)->get();
                                        @endphp
                                        @foreach ($details as $detail)
                                            <div class="col-3">
                                                <img src="{{asset('uploads/'.$detail->menu['gambar'])}}" width="80"
                                                    class="border-salmon img-fluid" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="container pt-4 pb-4">
                                        <h5 class="font-default font-weight-bold d-inline">Nama
                                            Pelanggan</h5>
                                        <p class="font-default">{{$order->nama_pelanggan}}</p>
                                        <h5 class="font-default font-weight-bold d-inline">No Meja</h5>
                                        <p class="font-default">{{$order->no_meja}}</p>
                                        <h5 class="font-default font-weight-bold d-inline">Waktu Order</h5>
                                        <p class="font-default">{{$order->waktu_order}}</p>
                                        <h5 class="font-default font-weight-bold d-inline">Keterangan</h5>
                                        <p class="font-default">{{$order->keterangan}}</p>
                                        <h5 class="font-default font-weight-bold d-inline">Status Bayar</h5><br>
                                        @if($order->status_order == 'Sudah Dibayar')
                                            <span class="badge badge-success font-default">Sudah Dibayar</span>
                                        @else
                                            <span class="badge badge-warning font-default">Belum Dibayar</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
