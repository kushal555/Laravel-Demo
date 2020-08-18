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

    $tasks = [
        'Task -1',
        'Task -2',
        'Task -3'
    ];

    return view('welcome',['tasks'=> $tasks]);
});

Route::get('/about',function(){  // homestead.app/about
   return view('about');
});

Route::get('/contact',function(){ //homestead.app/contact
   return view('contact');
});
