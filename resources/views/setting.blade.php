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

        {{-- Discount Table --}}
        <div class="row mx-auto mb-4">
             <div class="col-xl-12 pl-0 pr-0">
                <div class="bg-white rounded mr-3 p-4 pb-0 pt-3">
                    <h4 class="font-default font-weight-bold d-inline-block">Discounts</h4>
                    <button class="btn btn-sm btn-success font-default font-weight-bold float-right" data-toggle="modal" data-target="#diskonTambah">Add Member <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
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
                            @foreach($diskon as $disk)
                                <tr>
                                    <td class="font-weight-bold">{{$disk->kode}}</td>
                                    <td>{{$disk->diskon}}</td>
                                    <td>{{$disk->status}}</td>
                                    <td>
                                        <a href="{{ url('/settings/discount/destroy/'.$disk->id) }}" class="btn btn-sm btn-danger btn-deletes">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <button class="btn btn-sm btn-primary ml-1" data-toggle="modal" data-target="#diskonEdit{{$disk->id}}">
                                            <i class="fa fa-user-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Discount Table --}}

        <div class="row mx-auto mb-4">
            {{-- Members Table --}}
            <div class="col-xl-6 pl-0">
                <div class="bg-white w-100 rounded mr-3 p-4 pt-3 pb-2 overflow">
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
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->username}}</td>
                                    <td>{{$member->nama_level}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary ml-1">
                                            <i class="fa fa-user-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End Members Table --}}

            {{-- Category Table --}}
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->nama_kategori}}</td>
                                    <td>{{$category->icon}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary ml-1">
                                            <i class="fa fa-user-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End Category Table --}}
        </div>

        {{-- Modal Discount--}}
            <div class="modal fade" id="diskonTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-default" id="exampleModalLabel">Create Discount
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="row mx-auto mb-4">
                                <form action="{{ url('/settings/discount/store') }}" method="POST" class="w-100 mr-4 pr-2">
                                    @csrf
                                    <label for="diskon" class="font-default ml-3 font-weight-bold">Kode Diskon</label>
                                    @error('kode')
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
                                            font-family: 'Montserrat', sans-serif;" name="kode"
                                        class="w-100 mr-3 ml-3 @error('kode') no-valid @enderror" placeholder="Masukan Kode">
                                    <label for="diskon" class="font-default ml-3 font-weight-bold mt-3">Diskon</label>
                                    @error('diskon')
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
                                            font-family: 'Montserrat', sans-serif;" name="diskon"
                                        class="w-100 mr-3 ml-3 @error('diskon') no-valid @enderror" placeholder="Masukan Diskon (percent)">
                                    <button type="submit"
                                        class="btn bg-salmon mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($diskon as $disk)
                <div class="modal fade" id="diskonEdit{{$disk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-default" id="exampleModalLabel">Edit Discount
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="row mx-auto mb-4">
                                    <form action="{{ url('/settings/discount/update/'.$disk->id) }}" method="POST" class="w-100 mr-4 pr-2">
                                        @csrf
                                        <label for="diskon" class="font-default ml-3 font-weight-bold">Kode Diskon</label>
                                        @error('kode')
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
                                                font-family: 'Montserrat', sans-serif;" name="kode"
                                            class="w-100 mr-3 ml-3 @error('kode') no-valid @enderror" placeholder="Masukan Kode" value="{{$disk->kode}}">
                                        <label for="diskon" class="font-default ml-3 font-weight-bold mt-3">Diskon</label>
                                        @error('diskon')
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
                                                font-family: 'Montserrat', sans-serif;" name="diskon"
                                            class="w-100 mr-3 ml-3 @error('diskon') no-valid @enderror" placeholder="Masukan Diskon (percent)" value="{{$disk->diskon}}">
                                        <button type="submit"
                                            class="btn bg-salmon mr-3 ml-3 btn-block font-default text-white mt-3">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        {{-- End Modal Discount --}}

        {{-- Modal Members --}}

        {{-- End Modal Members --}}

        {{-- Modal Category --}}

        {{-- End Modal category --}}
    @endsection
