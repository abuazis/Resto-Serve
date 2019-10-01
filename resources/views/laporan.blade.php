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
                @if(Request::segment(1) == 'menu')
                    <form action="{{ url('/menu/result') }}" method="POST" class="d-inline-block cari mr-4">
                        @csrf
                        <input type="text" name="cari" id="cari" placeholder="Find Menu...">
                        <button type="submit" class="btn bg-salmon text-white"><i class="fas fa-search"></i></button>
                    </form>
                @endif
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
        <div class="row mt-4 ml-1 mr-3 mb-5">
            <h4 class="font-weight-bold ml-3 font-default bg-white mb-0 p-3 rounded">Track Record Order</h4>
            <div class="col-12">
                <div class="w-100 bg-white rounded p-3">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    @endsection
