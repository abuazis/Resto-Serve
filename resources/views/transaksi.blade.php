@extends('layouts.app')
    @section('title', 'Transaksi | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/order.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3">
                <h1 class="fas fa-pizza-slice ml-4"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Transaksi Tab</h3>
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
            <a href="/transaksi/order"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST ORDER
            </a>
            <a href="/transaksi"
                class="bg-white font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded font-weight-bold text-center text-dark btn-action mb-3">
                LIST TRANSAKSI
            </a>
        </div>
        <div class="row mt-4 ml-1 mr-3">
            <div class="table-responsive">
                <table class="table font-default rounded text-center">
                    <thead class="bg-salmon text-white">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Uang Dibayar</th>
                            <th scope="col">Uang Kembali</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($histories as $history)
                            <tr>
                                <td class="font-weight-bold">{{$history->id_order}}</td>
                                <td>Rp. {{number_format($history->total_bayar, 0, ',', '.')}}</td>
                                <td>Rp. {{number_format($history->uang_dibayar, 0, ',', '.')}}</td>
                                <td>Rp. {{number_format($history->total_kembali, 0, ',', '.')}}</td>
                                <td>
                                    <button class="btn btn-sm btn-light shadow mb-2" data-toggle="modal"
                                        data-target="#exampleModalDetail{{$history->id}}">STRUK</button>
                                    <button class="btn btn-sm btn-light shadow mb-2" data-toggle="modal"
                                        data-target="#exampleModalEdit{{$history->id}}">EDIT</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach ($histories as $history)
            <div class="modal fade" id="exampleModalEdit{{$history->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Edit Transaksi
                            </h5>
                        </div>
                        <div class="modal-body">
                            @php
                                $details = App\Models\DetailTransaction::where('id_transaksi', $history->id)->get();
                            @endphp
                            @foreach ($details as $detail)
                                <div class="row mx-auto mb-1">
                                    <div class="col-3">
                                        <img src="{{asset('uploads/'.$detail->menu['gambar'])}}" width="80" class="border-salmon img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-4 col-sm-5 d-flex align-items-center">
                                        <h5 class="font-default">{{$detail->menu['nama_menu']}}</h5>
                                    </div>
                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                        <h5 class="font-default">{{$detail->menu['jumlah']}}x</h5>
                                    </div>
                                    <div class="col-3 d-flex align-items-center text-right">
                                        <h5 class="font-default font-weight-bold">{{number_format($detail->sub_total, 0, ',', '.')}}</h5>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mx-auto mt-5">
                                <div class="col-md-12">
                                    <h4 class="font-default text-center">Total Pembayaran</h4>
                                    <h2 class="font-default text-center font-weight-bold">Rp. {{number_format($history->total_bayar, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                            <div class="row mx-auto mt-5 mb-4">
                                <form action="/transaksi/update/{{$history->id}}" method="POST" class="w-100 mr-4">
                                    @csrf
                                    @error('bayar')
                                        <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                    <input type="text" style="height: 45px;
                                                        color: #494949;
                                                        padding-left: 10px;
                                                        background: rgba(101, 101, 101, 0.24);
                                                        border: 2px solid #494949;
                                                        box-sizing: border-box;
                                                        border-radius: 6px;
                                                        font-family: 'Montserrat', sans-serif;" name="bayar" value="{{$history->uang_dibayar}}" class="w-100 mr-3 ml-3 @error('bayar') no-valid @enderror"
                                        placeholder="Masukan Uang Dibayar">
                                    <button type="submit"
                                        class="btn bg-salmon mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($histories as $history)
            <div class="modal fade" id="exampleModalDetail{{$history->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Struk Transaksi
                            </h5>
                        </div>
                        <div class="modal-body">
                            @php
                                $details = App\Models\DetailTransaction::where('id_transaksi', $history->id)->get();
                            @endphp
                            @foreach ($details as $detail)
                                <div class="row mx-auto mb-1">
                                    <div class="col-3">
                                        <img src="{{asset('uploads/'.$detail->menu['gambar'])}}" width="80" class="border-salmon img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-4 col-sm-5 d-flex align-items-center">
                                        <h5 class="font-default">{{$detail->menu['nama_menu']}}</h5>
                                    </div>
                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                        <h5 class="font-default">{{$detail->jumlah}}x</h5>
                                    </div>
                                    <div class="col-3 d-flex align-items-center text-right">
                                        <h5 class="font-default font-weight-bold">{{number_format($detail->sub_total, 0, ',', '.')}}</h5>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mx-auto mt-5">
                                <div class="col-md-12">
                                    <h4 class="font-default text-center">Total Pembayaran</h4>
                                    <h2 class="font-default text-center font-weight-bold">Rp. {{number_format($history->total_bayar, 0, ',', '.')}}</h2>
                                </div>
                            </div>
                            <div class="row mx-auto mt-5 mb-4">
                                <div class="col-6 font-default">
                                    <center>
                                        <h4>Uang Dibayar</h4>
                                        <h3 class="font-weight-bold">Rp. {{number_format($history->uang_dibayar, 0, ',', '.')}}</h4>
                                    </center>
                                </div>
                                <div class="col-6 font-default">
                                    <center>
                                        <h4>Uang Kembali</h4>
                                        <h3 class="font-weight-bold">Rp. {{number_format($history->total_kembali, 0, ',', '.')}}</h4>
                                    </center>
                                </div>
                            </div>
                            <div class="row mx-auto mt-5">
                                <button class="btn btn-block btn-success font-weight-bold font-default"><i class="fas fa-print"></i> CETAK STRUK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
