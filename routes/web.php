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

//カートに商品追加
Route::post('/cart/add', 'CartController@cartAdd')->name('cart_add');

//カートから商品削除
Route::post('/cart/delete', 'CartController@cartDelete')->name('cart_delete');

//注文フォーム
Route::get('/order', 'CartController@orderForm')->name('order');

//注文内容の確認
Route::post('/order/check', 'CartController@orderCheck')->name('order_check');

//注文完了
Route::post('/order/comp', 'CartController@orderComp')->name('order_comp');

//管理画面ログイン
Route::get('/admin/login', 'adminController@login')->name('admin_login');

//管理画面トップ
Route::get('/admin/home', 'adminController@home')->name('admin_home');

//受注一覧
Route::get('/admin/order', 'adminController@orderList')->name('order_list');

//受注詳細
Route::get('/admin/order/detail', 'adminController@orderDetail')->name('order_detail');

//商品一覧
Route::get('/admin/item', 'adminController@itemList')->name('item_list');

//商品詳細
Route::get('/admin/item/detail', 'adminController@itemDetail')->name('item_detail');
