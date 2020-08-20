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
Route::get('/',function(\Illuminate\Http\Request $request){
    return redirect('tasks');
});

Route::resource('tasks','TaskController');

Route::get('login','UserController@login');
Route::post('login-check','UserController@checkLogin');
Route::get('register','UserController@register');
Route::get('logout','UserController@logout');
Route::post('submit-register','UserController@postRegister');
