<?php

use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route giaodien
Route::get('index',
['as'=>'trangchu',
'uses'=>'PageController@getIndex']);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaisp'
]);

Route::get('chi-tiet-sp/{id}',[
    'as'=>'chitietsp',
    'uses'=>'PageController@getChitietsp'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'

]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getGioithieu'

]);

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('delete-to-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDeleteCart'
]);

Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);
//login
Route::get('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
    'as'=>'login',
    'uses'=>'Pagecontroller@postLogin'
]);
//singin
Route::get('dang-ki',[
    'as'=>'dangki',
    'uses'=>'PageController@getDangki'
]);
Route::post('dang-ki',[
    'as'=>'dangki',
    'uses'=>'PageController@postDangki'
]);

Route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@getDangxuat'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);


//route admin

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangxuat');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'producttype'],function(){
        //admin/loaisanpham/danhsach
        Route::get('danhsach','ProductTypeController@getDanhSach');
        Route::get('sua/{id}','ProductTypeController@getSua');
        Route::post('sua/{id}','ProductTypeController@postSua');

        Route::get('them','ProductTypeController@getThem');
        Route::post('them','ProductTypeController@postThem');

        Route::get('xoa/{id}','ProductTypeController@getXoa');

    });

    Route::group(['prefix'=>'product'],function(){
        //admin/product/danhsach
        Route::get('danhsach','ProductController@getDanhSach');
        Route::get('sua/{id}','ProductController@getSua');
        Route::post('sua/{id}','ProductController@postSua');

        Route::get('them','ProductController@getThem');
        Route::post('them','ProductController@postThem');

        Route::get('xoa/{id}','ProductController@getXoa');

    });
    Route::group(['prefix'=>'order'],function(){
        //admin/order/danhsach
        Route::get('danhsach','OrderController@getDanhSach');
        Route::get('sua/{id}','OrderController@getSua');
        Route::post('sua/{id}','OrderController@postSua');
      
        Route::get('xoa/{id}','OrderController@getXoa');

    });
    Route::group(['prefix'=>'orderDetail'],function(){
        //admin/orderdetail/danhsach
        Route::get('danhsach','OrderDetailController@getDanhSach');

        Route::get('sua/{id}','OrderDetailController@getSua');
        Route::post('sua/{id}','OrderDetailController@postSua');

        Route::get('xoa/{id}','OrderDetailController@getXoa');

    });


    Route::group(['prefix'=>'slide'],function(){
        //admin/slide/danhsach
        Route::get('danhsach','SlideController@getDanhSach');
        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');

        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('xoa/{id}','SlideController@getXoa');

    });

    Route::group(['prefix'=>'user'],function(){
        //admin/user/danhsach
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');
        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');

    });
    Route::group(['prefix'=>'customer'],function(){
        //admin/customer/danhsach
        Route::get('danhsach','CustomerController@getDanhSach');
        Route::get('sua/{id}','CustomerController@getSua');
        Route::post('sua/{id}','CustomerController@postSua');
      
        Route::get('xoa/{id}','CustomerController@getXoa');

    });






});
