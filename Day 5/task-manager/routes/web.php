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


Route::resource('tasks','TaskController')->middleware('custom.auth');

// Authentication
Route::get('logout','UserController@logout')->name('user.logout');
Route::get('user-login','UserController@login')->name('user.login');
Route::post('login-check','UserController@checkLogin')->name('user.validate-login');
Route::get('register','UserController@register')->name('user.register');
Route::post('submit-register','UserController@postRegister')->name('user.register-submit');
