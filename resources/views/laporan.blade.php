@extends('layouts.app') 
    @section('title', 'Laporan | RestoServe')
    @section('css')
        <link rel="stylesheet" href="{{asset('custom/laporan.css')}}">
    @stop
    @section('content')
        <div class="row mx-auto">
            <div class="top-bar w-100 bg-white mb-3 mr-3 ml-3">
                <h1 class="fas fa-chart-bar ml-4"></h1>
                <h3 class="font-default mt-3 pt-1 ml-2 d-inline-block font-weight-bold">Report Tab</h3>
                <form action="" method="get" class="d-inline-block cari mr-4">
                    <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                    <button class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row mx-auto mt-2">
            <div class="col-sm-6">
                <button
                    class="w-100 btn-lg bg-success font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded text-white mb-3">EXPORT
                    EXCEL <i class="fas fa-file-excel"></i></button>
            </div>
            <div class="col-sm-6">
                <button
                    class="w-100 btn-lg bg-danger font-default shadow mr-4 border-0 p-2 pr-3 pl-3 rounded text-white mb-3">EXPORT
                    PDF <i class="fas fa-file-pdf"></i></button>
            </div>
        </div>
        <div class="row mt-4 ml-1 mr-2">
            <div class="col-md-6 mb-3">
                <div class="w-100 bg-white rounded p-3">
                    <h4 class="font-default font-weight-bold">Monthly Order</h4>
                    <canvas id="laporanOrder" height="200vh"></canvas>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="w-100 bg-white rounded p-3">
                    <h4 class="font-default font-weight-bold">Most Ordered Menu</h4>
                    <canvas id="laporanMenu" height="200vh"></canvas>
                </div>
            </div>
        </div>
        <div class="row mt-4 ml-1 mr-3 mb-5">
            <div class="col-12">
                <div class="w-100 bg-white rounded p-3">
                    <h4 class="font-default font-weight-bold">Track Record</h4>
                    <canvas id="laporanHarian" height="100vh"></canvas>
                </div>
            </div>
        </div>
    @endsection