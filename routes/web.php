<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/login', function() {
    return view('pages.login');
});

Route::get('/suratmasuk/input', 'SuratMasukController@input')
    ->name('input-surat-masuk');

Route::post('/suratmasuk/create', 'SuratMasukController@create')
    ->name('create-surat-masuk');

//Auth::routes(['verify' => true]);
