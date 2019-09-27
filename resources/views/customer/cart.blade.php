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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="breadcrumb" class="font-default">
                            <ol class="breadcrumb font-weight-bold pt-3">
                                <span>
                                    Total Bayar =
                                    <h5 class="d-inline-block"><span class="badge badge-secondary">Rp. 500.000</span></h5>
                                </span>
                                <span class="ml-5">
                                    Diskon =
                                    <h5 class="d-inline-block"><span class="badge badge-secondary">-10%</span></h5>
                                </span>
                            </ol>
                        </nav>
                        <button class="btn btn-primary btn-block font-default btn-lg" data-toggle="modal"
                        data-target="#exampleModalCheckout">
                            Checkout <i class="fas fa-credit-card"></i>
                        </button>
                    </div>
                    <div class="col-md-3 pt-5 mt-md-5">
                        <form class="form-inline font-default">
                            <label class="sr-only" for="inlineFormInputName2">Diskon</label>
                            <input type="text" class="form-control mb-3 w-100" id="inlineFormInputName2" placeholder="Kode Diskon">

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
                            <form action="/transaksi/diskon" method="POST" class="w-100 mr-4 pr-2">
                                @csrf
                                @error('diskon')
                                    <span class="text-danger font-weight-light font-label ml-1 font-default" style="font-size: 80%" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                <label for="diskon" class="font-default ml-3 font-weight-bold">Alamat Anda</label>
                                <input type="text" style="height: 45px;
                                        color: #494949;
                                        padding-left: 10px;
                                        background: rgba(101, 101, 101, 0.24);
                                        border: 2px solid #494949;
                                        box-sizing: border-box;
                                        border-radius: 6px;
                                        font-family: 'Montserrat', sans-serif;" name="bayar"
                                    class="w-100 mr-3 ml-3 mb-2 @error('bayar') no-valid @enderror" placeholder="Masukan Uang Dibayar">
                                <textarea type="text" style="
                                        color: #494949;
                                        padding-left: 10px;
                                        background: rgba(101, 101, 101, 0.24);
                                        border: 2px solid #494949;
                                        box-sizing: border-box;
                                        border-radius: 6px;
                                        font-family: 'Montserrat', sans-serif;" name="diskon"
                                    class="w-100 mr-3 ml-3 @error('diskon') no-valid @enderror" placeholder="Masukan Alamat Tujuan..." rows="10"></textarea>
                                <button type="submit"
                                    class="btn bg-primary mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
