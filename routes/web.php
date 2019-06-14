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
    return view('welcome');
});

Route::prefix('/brand')->middleware('brand')->group(function(){
    Route::get('add','BrandController@add');
    Route::post('cate','BrandController@cate');
    Route::any('list','BrandController@list');
    Route::any('del/{id}','BrandController@del');
    Route::any('edit/{id}','BrandController@edit');
    Route::any('update/{id}','BrandController@update');
    // Route::any('file','BrandController@file');

});

Route::prefix('/login')->group(function(){
    Route::any('add','LoginController@add');
    Route::any('login','LoginController@login');
    Route::any('reg','LoginController@reg');
    Route::any('shen','LoginController@shen');
    Route::any('sendemail','LoginController@sendemail');

});
