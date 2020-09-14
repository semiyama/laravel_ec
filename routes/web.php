<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', 'IndexController@index')->name('index');

//商品カテゴリページ
Route::get('/products/category/{id}', 'ItemController@list')->name('category');

//商品カテゴリページ
Route::get('/products/detail/{id}', 'ItemController@detail')->name('detail');

//カート
Route::get('/cart', 'CartController@cart')->name('cart');

//注文フォーム
Route::get('/order', 'CartController@orderForm')->name('order');

//注文内容の確認
Route::get('/order/check', 'CartController@orderCheck')->name('order_check');

//注文内容の確認
Route::get('/order/comp', 'CartController@orderComp')->name('order_comp');
