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

Route::post('reg','AuthController@register');
Route::post('insert','AuthController@insert');
Route::post('login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
    Route::post('auth/logout', 'AuthController@logout');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
