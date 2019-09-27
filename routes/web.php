<?php

use Illuminate\Support\Facades\Session;
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

    Route::get('/dashboard', 'DashboardController@index');

    // Routing For Menu Feature
    Route::get('/menu', 'MenuController@index');
    Route::get('/menu/{name}', 'MenuController@category');
    Route::get('/menu/destroy/{id}', 'MenuController@destroy');
    Route::post('/menu/result', 'MenuController@index');
    Route::post('/menu/store', 'MenuController@store');
    Route::post('/menu/update/{id}', 'MenuController@update');

    // Routing For Order Feature
    Route::get('/order', 'OrderController@index');
    Route::get('/order/create', 'OrderController@create');
    Route::get('/order/create/{name}', 'OrderController@category');
    Route::post('/order/store', 'OrderController@store');
    Route::get('/order/destroy/{id}', 'OrderController@destroy');

    // Routing For Cart Content
    Route::get('/cart/add/{id}', 'CartController@store');
    Route::get('/cart/remove/{id}', 'CartController@remove');

    // Routing For Transaksi
    Route::get('/transaksi/order', 'TransaksiController@order');
    Route::post('/order/pay/{id}', 'TransaksiController@bayar');
    Route::get('/transaksi', 'TransaksiController@history');
    Route::post('/transaksi/update/{id}', 'TransaksiController@update');
    Route::post('/transaksi/diskon', 'TransaksiController@diskon');

    Route::get('/monthly', 'LaporanController@monthly');
    Route::get('/laporan', function () {
        return view('laporan');
    });

    Route::get('/logout', 'HomeController@logout');

    Route::get('/customer', function () {
        return redirect('customer/menu');
    });

    Route::get('/customer/menu', function () {
        return view('customer.index');
    });

    Route::get('/customer/cart', function () {
        return view('customer.cart');
    });

    Route::get('/customer/user', function () {
        return view('customer.user');
    });

    Route::get('/customer/order', function () {
        return view('customer.order');              
    });
});

Auth::routes();
Route::get('/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
