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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/mahasiswa','MahasiswaController');
Route::post('/mahasiswa/cekkonsentrasi','MahasiswaController@cekkonsentrasi')->name('mahasiswa.cekkonsentrasi');
Route::resource('/dosen','DosenController');
Route::resource('/konsentrasi','KonsentrasiController');
Route::resource('prodi','ProdiController');
Route::resource('/ruangan','RuanganController');
Route::resource('/tahunangkatan','TahunAngkatanController');
Route::resource('/tahunakademik','TahunAkademikController');
Route::resource('/matkul','MatkulController');
