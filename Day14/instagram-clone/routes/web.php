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
Route::get('post/policy-status', 'PostController@changeStatus')->name('post.change-status')->middleware('can:policy-status,post');
Route::get('make-payment','PaymentController@index');
Route::post('subscribe-payment','PaymentController@subscribe');
Route::get('my-subscription','PaymentController@mySubscription')->name('my-subscription');
Route::get('get-all-subscriptions','PaymentController@getAllUsersSubscription')->name('all-subscriptions');
Route::get('swap-subscription-plan','PaymentController@swapSubscriptionPlan')->name('subscription.swap');
Route::get('cancel-subscription-plan','PaymentController@cancelSubscriptionPlan')->name('subscription.cancel');
Route::get('resume-subscription-plan','PaymentController@resumeSubscriptionPlan')->name('subscription.resume');
