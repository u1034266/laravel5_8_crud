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
<<<<<<< HEAD
    return view('dashboard');
=======
    return view('welcome');
>>>>>>> 349d98805e3dae2e465bdac2815f1323d43f05ca
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
