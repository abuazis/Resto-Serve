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
                        <button class="btn btn-primary btn-block font-default btn-lg">
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
    @endsection
