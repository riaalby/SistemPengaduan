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



Route::get('/', 'LoginController@index')->name('login');
Route::POST('login/submit', 'LoginController@login')->name('login-submit');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('ruangan', 'RuanganController@index')->name('ruangan');
Route::get('ruangan-tambah', 'RuanganController@tambah')->name('ruangan-tambah');
Route::POST('ruangan-simpan', 'RuanganController@simpan')->name('ruangan-simpan');

Route::get('ruangan-edit/{id}', 'RuanganController@edit')->name('ruangan-edit');
Route::POST('ruangan-update/{id}', 'RuanganController@update')->name('ruangan-update');
Route::GET('ruangan-delete/{id}', 'RuanganController@delete')->name('ruangan-delete');

Route::get('staf', 'StafController@index')->name('staf');
Route::get('staf-tambah', 'StafController@tambah')->name('staf-tambah');
Route::POST('staf-simpan', 'StafController@simpan')->name('staf-simpan');

Route::get('staf-edit/{id}', 'StafController@edit')->name('staf-edit');
Route::POST('staf-update/{id}', 'StafController@update')->name('staf-update');
Route::GET('staf-delete/{id}', 'stafController@delete')->name('staf-delete');

Route::get('pengaduan', 'PengaduanController@index')->name('pengaduan');
Route::get('pengaduan-tambah', 'PengaduanController@tambah')->name('pengaduan-tambah');
Route::POST('pengaduan-simpan', 'PengaduanController@simpan')->name('pengaduan-simpan');

Route::get('pengaduan-edit/{id}', 'PengaduanController@edit')->name('pengaduan-edit');
Route::POST('pengaduan-update/{id}', 'PengaduanController@update')->name('pengaduan-update');
Route::get('pengaduan-selesai/{id}', 'PengaduanController@selesai')->name('pengaduan-selesai');
Route::get('pengaduan-completed/{id}', 'PengaduanController@completed')->name('pengaduan-completed');
Route::GET('pengaduan-delete/{id}', 'PengaduanController@delete')->name('pengaduan-delete');

Route::get('pengaduan-info', 'InfoPengaduanController@index')->name('info-pengaduan');
Route::get('pengaduan-detail/{id}', 'InfoPengaduanController@detail')->name('detail-pengaduan');
Route::POST('pengaduan-info/filter','InfoPengaduanController@filter');
Route::POST('pengaduan-info/download','InfoPengaduanController@download')->name('download-pengaduan');
