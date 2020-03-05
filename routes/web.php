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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');

Route::post('admin/dangnhap','UserController@postDangnhapAdmin');

Route::get('admin/logout','UserController@getDangXuatAdmin');

Route::group(['prefix' =>'admin','middleware'=>'adminLogin'], function(){
	Route::group(['prefix' =>'theloai'], function(){	
		//admin/theloai/danhsach
		Route::get('danhsach','TheloaiController@getDanhSach');

		Route::get('sua/{id}','TheloaiController@getSua');

		Route::post('sua/{id}','TheloaiController@postSua');

		Route::get('them','TheloaiController@getThem');

		Route::post('them','TheloaiController@postThem');

		Route::get('xoa/{id}','TheloaiController@getXoa');

	});

	Route::group(['prefix' =>'loaitin'], function(){	
		//admin/loai/them
		Route::get('danhsach','LoaitinController@getDanhSach');

		Route::get('sua/{id}','LoaitinController@getSua');

		Route::post('sua/{id}','LoaitinController@postSua');

		Route::get('them','LoaitinController@getThem');

		Route::post('them','LoaitinController@postThem');

		Route::get('xoa/{id}','LoaitinController@getXoa');

	});

	Route::group(['prefix' =>'tintuc'], function(){	
		//admin/theloai/them
		Route::get('danhsach','TintucController@getDanhSach');

		Route::get('sua/{id}','TintucController@getSua');
		Route::post('sua/{id}','TintucController@postSua');

		Route::get('them','TintucController@getThem');
		Route::post('them','TintucController@postThem');

		Route::get('xoa/{id}','TintucController@getXoa');

	});

	Route::group(['prefix' =>'slide'], function(){	
		//admin/theloai/them
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');

	});


	Route::group(['prefix' =>'user'], function(){	
		//admin/loai/them
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});

	Route::group(['prefix'=>'comment'], function(){
		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');


	});


	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');


	});


});
