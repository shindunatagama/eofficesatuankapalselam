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
    ->name('home')
    ->middleware(['auth', 'activeuser']);

/*--- Surat Masuk ---*/
Route::get('/suratmasuk/daftar', 'SuratMasukController@daftar')
    ->name('daftar-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/input', 'SuratMasukController@input')
    ->name('input-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::post('/suratmasuk/create', 'SuratMasukController@create')
    ->name('create-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/persetujuan', 'SuratMasukController@persetujuan')
    ->name('persetujuan-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/disposisi', 'SuratMasukController@disposisi')
    ->name('disposisi-surat-masuk')
    ->middleware(['auth', 'activeuser']);
/*--- End Surat Masuk ---*/

/*--- Pengguna ---*/
Route::get('pengguna/verifikasi', 'PenggunaController@verifikasi')
    ->name('verifikasi-pengguna')
    ->middleware(['auth']);

Route::get('/pengguna/ubahpassword/{username}', 'PenggunaController@ubahPassword')
    ->name('ubah-password-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::post('pengguna/updatepassword', 'PenggunaController@updatePassword')
    ->name('update-password')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/profil/{username}', 'PenggunaController@profil')
    ->name('profil-pengguna')
    ->middleware(['auth', 'activeuser']);

    Route::post('pengguna/updateprofil', 'PenggunaController@updateProfil')
    ->name('update-profil')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/lupapassword', 'PenggunaController@lupaPassword')
    ->name('lupa-password-pengguna');

Route::post('pengguna/resetpassword', 'PenggunaController@resetPassword')
    ->name('reset-password-pengguna');

Route::get('/pengguna/pemeliharaan', 'PenggunaController@pemeliharaan')
    ->name('pemeliharaan-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::get('pengguna/edit/{username}', 'PenggunaController@edit')
    ->name('edit-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::post('pengguna/update', 'PenggunaController@update')
    ->name('update-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::get('pengguna/detail/{username}', 'PenggunaController@detail')
    ->name('detail-pengguna')
    ->middleware(['auth', 'activeuser']);
/*--- End Pengguna ---*/

Auth::routes();
