@extends('layouts.customer')
    @section('content')
        <header id="content" class="mt-5" style="min-height: 800px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="w-100 bg-dark mt-5" style="box-shadow: 0px 0px 8px 1px #aaa">
                            <ul class="nav d-flex justify-content-around">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-pizza-slice"></i> Pizza</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-hamburger"></i> Pasta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-drumstick-bite"></i> Chicken</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-ice-cream"></i> Dessert</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-mug-hot"></i> Drink</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endsection