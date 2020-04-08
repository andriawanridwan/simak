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

// Route::get('/', function () {
//     return view('dashboard');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ruangan','KelolaRuangan@index');
Route::get('/dashboard','KelolaRuangan@dash');
Route::post('/simpan_ruangan','KelolaRuangan@store');
Route::get('/hapus_ruangan/{id}', 'KelolaRuangan@destroy');
Route::get('/edit_ruangan/{id}', 'KelolaRuangan@edit');
Route::post('/update_ruangan/{id}','KelolaRuangan@update');

Route::get('/prodi','KelolaProdi@index');
Route::post('/simpan_prodi','KelolaProdi@store');
Route::get('/hapus_prodi/{id}', 'KelolaProdi@destroy');
Route::get('/edit_prodi/{id}', 'KelolaProdi@edit');
Route::post('/update_prodi/{id}','KelolaProdi@update');