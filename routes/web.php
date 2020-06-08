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

Route::get('/suratmasuk/detail/{uuid}', 'SuratMasukController@detail')
    ->name('detail-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/add', 'SuratMasukController@add')
    ->name('input-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::post('/suratmasuk/create', 'SuratMasukController@create')
    ->name('create-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/persetujuan', 'SuratMasukController@persetujuan')
    ->name('persetujuan-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/approval/{uuid}', 'SuratMasukController@approval')
    ->name('approval-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::post('/suratmasuk/update', 'SuratMasukController@update')
    ->name('update-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/disposisi', 'SuratMasukController@disposisi')
    ->name('disposisi-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::get('/suratmasuk/disposisi-view/{uuid}', 'SuratMasukController@disposisiView')
    ->name('disposisi-view-surat-masuk')
    ->middleware(['auth', 'activeuser']);

Route::post('/suratmasuk/disposisi-act', 'SuratMasukController@disposisiAct')
    ->name('disposisi-act-surat-masuk')
    ->middleware(['auth', 'activeuser']);
/*--- End Surat Masuk ---*/

/*--- Pengguna ---*/
Route::get('/pengguna/verifikasi', 'PenggunaController@verifikasi')
    ->name('verifikasi-pengguna')
    ->middleware(['auth']);

Route::get('/pengguna/ubah-password/{uuid}', 'PenggunaController@ubahPassword')
    ->name('ubah-password-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::post('/pengguna/update-password', 'PenggunaController@updatePassword')
    ->name('update-password')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/profil/{uuid}', 'PenggunaController@profil')
    ->name('profil-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::post('/pengguna/update-profil', 'PenggunaController@updateProfil')
    ->name('update-profil')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/lupa-password', 'PenggunaController@lupaPassword')
    ->name('lupa-password-pengguna');

Route::post('/pengguna/reset-password', 'PenggunaController@resetPassword')
    ->name('reset-password-pengguna');

Route::get('/pengguna/pemeliharaan', 'PenggunaController@pemeliharaan')
    ->name('pemeliharaan-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/edit/{uuid}', 'PenggunaController@edit')
    ->name('edit-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::post('/pengguna/update', 'PenggunaController@update')
    ->name('update-pengguna')
    ->middleware(['auth', 'activeuser']);

Route::get('/pengguna/detail/{uuid}', 'PenggunaController@detail')
    ->name('detail-pengguna')
    ->middleware(['auth', 'activeuser']);
/*--- End Pengguna ---*/

Route::get('/refresh-captcha', 'CaptchaController@refreshCaptcha')
    ->name('refresh-captcha');

Auth::routes();
