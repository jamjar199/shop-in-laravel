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

Route::get('/shop', 'ProductController@index');
Route::get('/shop/create', 'ProductController@create');
Route::post('/shop', 'ProductController@store');
Route::get('/shop/{id}', 'ProductController@show');