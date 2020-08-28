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

//Route::get('/', function () {
//    $users = \App\User::all();
//    return view('welcome');
//});

Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('google.redirect');

Route::get('/', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('post','PostController');
