<?php

use Illuminate\Support\Carbon;
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
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth', 'revalidate']], function () {

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/menu', 'MenuController@index');
    Route::get('/menu/{name}', 'MenuController@category');
    Route::get('/menu/destroy/{id}', 'MenuController@destroy');
    Route::post('/menu/store', 'MenuController@store');
    Route::post('/menu/update/{id}', 'MenuController@update');

    Route::get('/order', 'OrderController@index');
    Route::get('/order/create', 'OrderController@create');
    Route::get('/order/create/{name}', 'OrderController@category');
    Route::post('/order/store', 'OrderController@store');
    Route::get('/order/destroy/{id}', 'OrderController@destroy');
    Route::post('/order/result', 'OrderController@index');

    Route::get('/cart/add/{id}', 'CartController@store');
    Route::get('/cart/remove/{id}', 'CartController@remove');

    Route::get('/transaksi/order', 'TransaksiController@order');
    Route::post('/order/pay/{id}', 'TransaksiController@bayar');
    Route::get('/transaksi', 'TransaksiController@history');
    Route::post('/transaksi/update/{id}', 'TransaksiController@update');
    Route::get('/print/{id}', 'TransaksiController@receipt');
    Route::post('/transaksi/result', 'TransaksiController@order');

    Route::get('/settings', 'SettingController@index');
    Route::post('/settings/discount/store', 'SettingController@store_discount');
    Route::post('/settings/discount/update/{id}', 'SettingController@update_discount');
    Route::get('/settings/discount/destroy/{id}', 'SettingController@destroy_discount');
    Route::post('/settings/category/store', 'SettingController@store_category');
    Route::post('/settings/category/update/{id}', 'SettingController@update_category');
    Route::get('/settings/category/destroy/{id}', 'SettingController@destroy_category');
    Route::post('/settings/member/store', 'SettingController@store_member');
    Route::post('/settings/member/update/{id}', 'SettingController@update_member');
    Route::get('/settings/member/destroy/{id}', 'SettingController@destroy_member');

    Route::get('/laporan', 'LaporanController@index');

    Route::get('/logout', 'HomeController@logout');

    Route::get('/customer', function () {
        return redirect('customer/menu');
    });

    Route::get('/customer/menu', 'CustomerController@index');
    Route::get('/customer/menu/{name}', 'CustomerController@category');
    Route::get('/customer/cart', 'CustomerController@cart');
    Route::post('/customer/discount', 'CustomerController@discount');
    Route::get('/customer/order', 'CustomerController@order');
    Route::post('/customer/checkout', 'CustomerController@checkout');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/report/pdf', 'LaporanController@download');
Route::get('/report/excel', 'LaporanController@export');
