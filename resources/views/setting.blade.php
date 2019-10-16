@extends('layouts.app')
    @section('title', 'Setting | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/order.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3">
                <h1 class="fas fa-tools ml-4" style="font-size: 35px;"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Settings Tab</h3>
            </div>
        </div>

        <div class="row mx-auto mb-4">
             <div class="col-xl-12 pl-0 pr-0">
                <div class="bg-white rounded mr-3 p-4 pb-0 pt-3">
                    <h4 class="font-default font-weight-bold d-inline-block">Discounts</h4>
                    <button class="btn btn-sm btn-success font-default font-weight-bold float-right">Add Member <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    <table class="table rounded font-default mt-2 text-center">
                        <thead class="bg-salmon text-white">
                            <tr>
                                <th scope="col">Kode Diskon</th>
                                <th scope="col">Diskon (Percent)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>Invalid</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mx-auto">
            <div class="col-xl-6 pl-0">
                <div class="bg-white w-100 rounded mr-3 p-4 pt-3 pb-2 overflow" style="height: 400px;">
                    <h4 class="font-default font-weight-bold d-inline-block">Members</h4>
                    <button class="btn btn-sm btn-success font-default font-weight-bold float-right">Add Member <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    <table class="table rounded font-default mt-2 text-center">
                        <thead class="bg-salmon text-white">
                            <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-6 pl-0">
                <div class="bg-white w-100 rounded mr-3 bg-white w-100 rounded mr-3 p-4 pt-3 pb-2">
                    <h4 class="font-default font-weight-bold d-inline-block">Category</h4>
                    <button class="btn btn-sm btn-success font-default font-weight-bold float-right">Add Member <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    <table class="table rounded font-default mt-2 text-center">
                        <thead class="bg-salmon text-white">
                            <tr>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>markdow</td>
                                <td>Waiter</td>
                                <td>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary ml-1">
                                        <i class="fa fa-user-edit" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
