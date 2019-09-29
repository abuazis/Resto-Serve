@extends('layouts.customer')
    @section('content')
        <header id="content" class="mt-5" style="min-height: 800px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 pt-5 mt-5 ">
                        <div class="table-responsive">
                            <table class="table table-dark font-default text-center" style="box-shadow: 0px 0px 8px 1px #aaa">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                                            <td class="align-middle">
                                                <img src="{{asset('uploads/'.$item->attributes->picture)}}" width="50" class="img-fluid" alt="">
                                            </td>
                                            <td class="align-middle">{{ $item->name }}</td>
                                            <td class="align-middle">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="align-middle">{{ $item->quantity }}</td>
                                            <td class="align-middle">Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                            <td class="align-middle"><a href="/cart/remove/{{$item->id}}"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="breadcrumb" class="font-default">
                            <ol class="breadcrumb font-weight-bold pt-3">
                                <span>
                                    Total Bayar =
                                    <h5 class="d-inline-block"><span class="badge badge-secondary">Rp. {{number_format($total, 0, ',', '.')}}</span></h5>
                                </span>
                                @if($discount)
                                    <span class="ml-5">
                                        Diskon =
                                        <h5 class="d-inline-block"><span class="badge badge-secondary">{{$discount->getValue()}}</span></h5>
                                    </span>
                                @endif
                            </ol>
                        </nav>
                        <button class="btn btn-primary btn-block font-default btn-lg" data-toggle="modal"
                        data-target="#exampleModalCheckout">
                            Checkout <i class="fas fa-credit-card"></i>
                        </button>
                    </div>
                    <div class="col-md-3 pt-5 mt-md-5">
                        <form action="/customer/discount" method="POST" class="form-inline font-default">
                            @csrf
                            <label class="sr-only">Diskon</label>
                            @error('diskon')
                                <span class="text-danger font-weight-light font-label ml-1 font-default mb-1" style="font-size: 80%" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <input type="text" class="form-control mb-3 w-100" name="diskon" placeholder="Kode Diskon">

                            <button type="submit" class="btn btn-primary mb-2 w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="modal fade" id="exampleModalCheckout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-default" id="exampleModalLabel">Checkout Delivery
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mx-auto mb-4">
                            <form action="/customer/checkout" method="POST" class="w-100 mr-4 pr-2">
                                @csrf
                                <label for="nama" class="font-default ml-3 font-weight-bold">Atas Nama</label>
                                <input type="text" style="height: 45px;
                                        color: #494949;
                                        padding-left: 10px;
                                        background: rgba(101, 101, 101, 0.24);
                                        border: 2px solid #494949;
                                        box-sizing: border-box;
                                        border-radius: 6px;
                                        font-family: 'Montserrat', sans-serif;" name="nama"
                                    class="w-100 mr-3 ml-3 mb-2 @error('nama') no-valid @enderror" placeholder="Masukan Nama Pelanggan">
                                <label for="alamat" class="font-default ml-3 font-weight-bold">Alamat Anda</label>
                                <textarea type="text" style="
                                        color: #494949;
                                        padding-left: 10px;
                                        background: rgba(101, 101, 101, 0.24);
                                        border: 2px solid #494949;
                                        box-sizing: border-box;
                                        border-radius: 6px;
                                        font-family: 'Montserrat', sans-serif;" name="alamat"
                                    class="w-100 mr-3 ml-3 @error('alamat') no-valid @enderror" placeholder="Masukan Alamat Tujuan..." rows="10"></textarea>
                                <button type="submit"
                                    class="btn bg-primary mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
