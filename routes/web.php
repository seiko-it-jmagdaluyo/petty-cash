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
    if(Auth::check()){
        return view('home');
    }else{
        return view('login');
    }
})->name('user-login');

Route::middleware(['auth'])->group(function () {
    Route::get('user-master','UserController@getUsers');
    Route::resource('userMethods', 'UserController');
});

Auth::routes();