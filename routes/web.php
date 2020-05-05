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



Auth::routes();

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/', function () {
    return view('dashboard');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/registrasi/delete/{id}','RegistrasiController@hapus');
    Route::get('/krs/delete/{id}','KrsController@hapus');
    Route::resource('/mahasiswa','MahasiswaController');
    Route::resource('/pengguna','PenggunaController');
    Route::get('/pengguna/active/{id}','PenggunaController@active')->name('pengguna.active');
    Route::get('/pengguna/tidakactive/{id}','PenggunaController@tidakactive')->name('pengguna.tidakactive');
    Route::post('/mahasiswa/cekkonsentrasi','MahasiswaController@cekkonsentrasi')->name('mahasiswa.cekkonsentrasi');
    Route::resource('/dosen','DosenController');
    Route::post('/dosen/create','DosenController@store');
    Route::get('/dosen/{id}/edit','DosenController@edit');
    Route::post('/dosen/{id}/update','DosenController@update');
    Route::get('/dosen/{id}/delete','DosenController@destroy');
    Route::resource('/konsentrasi','KonsentrasiController');
    Route::resource('prodi','ProdiController');
    Route::resource('/ruangan','RuanganController');
    Route::resource('/tahunangkatan','TahunAngkatanController');
    Route::resource('/tahunakademik','TahunAkademikController');
    Route::post('/tahunakademik/create','TahunAkademikController@store');
    Route::get('/tahunakademik/{id}/edit','TahunAkademikController@edit');
    Route::post('/tahunakademik/{id}/update','TahunAkademikController@update');
    Route::get('/tahunakademik/{id}/delete', 'TahunAkademikController@destroy');
    Route::resource('/matkul','MatkulController');
    Route::resource('/jadwal','JadwalController');
    Route::resource('/krs','KrsController');
    Route::resource('khs','khsController');
    Route::get('/krs/ambil/{nim}/{jadwal_id}','KrsController@ambilkrs')->name('ambilkrs');
    Route::get('khs/{nim}/{semester}','KhsController@Khs@submitkhs')->name('khs.submitkhs');
    Route::post('khs/cari','KhsController@cari')->name('khs.cari');
    Route::post('krs/cari','KrsController@cari')->name('krs.cari');
    Route::post('krs/carinama','KrsController@carinama')->name('krs.carinama');
    Route::post('/jadwal/cari','JadwalController@cari')->name('jadwal.cari');
    Route::post('/jadwal/hariupdate','JadwalController@hariupdate')->name('hari.update');
    Route::post('/jadwal/ruangupdate','JadwalController@ruangupdate')->name('ruangan_update');
    Route::post('/jadwal/dosenupdate','JadwalController@dosenupdate')->name('dosen_update');
    Route::post('/jadwal/jamawalupdate','JadwalController@jamawalupdate')->name('jam_awal.update');
    Route::post('/jadwal/jamakhirupdate','JadwalController@jamakhirupdate')->name('jam_akhir.update');
    Route::resource('/registrasi','RegistrasiController');
    Route::post('/registrasi/cari','RegistrasiController@cari')->name('registrasi.cari');
});
Route::group(['middleware' => ['auth']], function(){
    Route::resource('biodata','BiodataController');
    Route::get('cetakkrs/{nim}','KrsController@cetakkrs')->name('cetakkrs');
    Route::get('cetakkhs/{nim}','KhsController@cetakkhs')->name('cetakkhs');
});
Route::group(['middleware' => ['auth','dosen']], function(){
    Route::get('lihatjadwal','JadwalController@lihatjadwal')->name('lihatjadwal');
    Route::resource('nilai','NilaiController');
    Route::get('nilaikehadiran/{nim}/{nilai}','NilaiController@nilaikehadiran');
    Route::get('nilaitugas/{nim}/{nilai}','NilaiController@nilaitugas');
    Route::get('nilaimutu/{nim}/{nilai}','NilaiController@nilaimutu');
    Route::get('nilaigrade/{nim}/{nilai}','NilaiController@nilaigrade');
}); 
Route::group(['middleware' => ['auth','mahasiswa']], function(){
    Route::get('jadwalkuliah','JadwalController@jadwalkuliah')->name('jadwalkuliah');
    Route::get('khsmahasiswa','KhsController@khsmahasiswa')->name('khsmahasiswa');
    Route::get('krsmahasiswa','KrsController@krsmahasiswa')->name('krsmahasiswa');
    Route::get('tambahkrs/{nim}','KrsController@tambahkrs')->name('tambahkrs');
    Route::get('tambahkrs/{nim}/{jadwal_id}','KrsController@ambilkrs')->name('tambahkrs.store');
    Route::get('krsmahasiswa/hapus/{id}','KrsController@hapuskrsmahasiswa')->name('hapuskrsmahasiswa');
    
}); 