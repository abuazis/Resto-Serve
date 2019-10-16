@extends('layouts.app')
    @section('title', 'Transaksi | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/order.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3">
                <h1 class="fas fa-pizza-slice ml-4" style="font-size: 35px;"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Transaksi Tab</h3>
                @if(Request::segment(2) == 'order')
                    <form action="{{ url('/transaksi/result') }}" method="POST" class="d-inline-block cari mr-4">
                        @csrf
                        <input type="text" name="cari" id="cari" placeholder="Find Customer...">
                        <button type="submit" class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mx-auto mt-2">
            <a href="{{ url('/transaksi/order') }}"
                class="bg-grey font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST ORDER
            </a>
            <a href="{{ url('/transaksi') }}"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST TRANSAKSI
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
                            <th scope="col">Status Transaksi</th>
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
                                    @if($order->status_order == 'Belum Dibayar')
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    @else
                                        <span class="badge badge-success">Sudah Dibayar</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-light shadow" data-toggle="modal"
                                        data-target="#exampleModalInsert{{$order->id}}">BAYAR ORDER</button>
                                    {{-- <button class="btn btn-sm btn-light shadow" data-toggle="modal"
                                        data-target="#exampleModalDiskon{{$order->id}}">DISKON</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($orders as $order)
            <div class="modal fade" id="exampleModalInsert{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Insert Transaksi
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
                                    <h2 class="font-default text-center font-weight-bold">Rp. {{number_format($order->total_pembayaran, 0, ',', '.')}}
                                    </h2>
                                </div>
                            </div>
                            <div class="row mx-auto mt-5 mb-4">
                                <form action="{{ url('/order/pay/'.$order->id) }}" method="POST" class="w-100 mr-4 pr-2">
                                    @csrf
                                    @error('bayar')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="id_order" value="{{$order->id}}">
                                    <input type="text" style="height: 45px;
                                            color: #494949;
                                            padding-left: 10px;
                                            background: rgba(101, 101, 101, 0.24);
                                            border: 2px solid #494949;
                                            box-sizing: border-box;
                                            border-radius: 6px;
                                            font-family: 'Montserrat', sans-serif;" name="bayar"
                                        class="w-100 mr-3 ml-3 @error('bayar') no-valid @enderror" placeholder="Masukan Uang Dibayar">
                                    <input type="hidden" name="total" value="{{$order->total_pembayaran}}">
                                    <button type="submit"
                                        class="btn bg-salmon mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($orders as $order)
            <div class="modal fade" id="exampleModalDiskon{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Gunakan Diskon
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="row mx-auto mb-4">
                                <form action="{{ url('/transaksi/diskon') }}" method="POST" class="w-100 mr-4 pr-2">
                                    @csrf
                                    @error('diskon')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <label for="diskon" class="font-default ml-3 font-weight-bold">Kode Diskon</label>
                                    <input type="text" style="height: 45px;
                                            color: #494949;
                                            padding-left: 10px;
                                            background: rgba(101, 101, 101, 0.24);
                                            border: 2px solid #494949;
                                            box-sizing: border-box;
                                            border-radius: 6px;
                                            font-family: 'Montserrat', sans-serif;" name="diskon"
                                        class="w-100 mr-3 ml-3 @error('diskon') no-valid @enderror" placeholder="Masukan Diskon (Jika Ada)">
                                    <input type="hidden" name="total" value="{{$order->id}}">
                                    <button type="submit"
                                        class="btn bg-salmon mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
