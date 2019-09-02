<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['auth', 'revalidate']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/menu', 'MenuController@index');

    Route::get('/menu/create', 'MenuController@create');

    Route::get('/order', function () {
        return view('order');
    });

    Route::get('/order/create', function () {
        return view('create_order');
    });

    Route::get('/transaksi', function () {
        return view('transaksi');
    });

    Route::get('/transaksi/order', function () {
        return view('order_transaksi');
    });

    Route::get('/laporan', function () {
        return view('laporan');
    });

    Route::get('/logout', 'HomeController@logout');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
