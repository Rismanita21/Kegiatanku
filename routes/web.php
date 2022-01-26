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

Route::get('/', 'WelcomeController@index')->name('/');


Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'kegiatan'], function(){
    Route::get('/tampilkan', 'KegiatanController@show')->name('kegiatan.tampilkan');
    Route::get('/create/{kegiatan}', 'KegiatanController@create')->name('kegiatan.create');
    Route::post('/store','KegiatanController@store')->name('kegiatan.store');
});
Route::get('/pendaftaran', 'DaftarController@index')->name('daftar.index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');


Route::group(['prefix' => 'data'], function() {
    Route::get('/siswa', 'DataSiswaController@index')->name('data.siswa');
});
Route::group(['prefix' => 'tambah-data'], function() {
    Route::get('/siswa', 'DataSiswaController@create')->name('tambah-data.siswa');
    Route::post('/store', 'DataSiswaController@store')->name('tambah-data.store');
});
Route::group(['prefix' => 'edit-data'], function() {
    route::get('siswa/{user}', 'DataSiswaController@edit')->name('edit-data.siswa');
});
Route::group(['prefix' => 'destroy'], function() {
    route::delete('data/siswa/{user}', 'DataSiswaController@destroy')->name('destroy.data.siswa');
    route::delete('data/activity/{activity}','ManagekegiatanController@destroy')->name('destroy.data.activity');
});
Route::group(['prefix' => 'updated'], function(){
    route::patch('data/siswa/{user}', 'DataSiswaController@updated')->name('updated.data.siswa');
});


Route::group(['prefix'  => 'manage-kegiatan'], function(){
    route::get('/','ManagekegiatanController@index')->name('manage-kegiatan');
    route::get('/add-form','ManagekegiatanController@create')->name('manage-kegiatan.add-form');    
    route::get('/add-form/edit-kegiatan/{id}','ManagekegiatanController@edit')->name('manage-kegiatan.add-form.edit-kegiatan');
    route::post('/post','ManagekegiatanController@store')->name('manage-kegiatan.store');
    route::patch('/update/{activity}','ManagekegiatanController@update')->name('updated.data.kegiatan');
});

Route::group(['prefix' => 'verifikasi-pendaftaran'], function(){
    Route::get('/verifikasi-pendaftaran','VerifikasiController@index')->name('verifikasi-pendaftaran');
    Route::get('/ulang','DaftarUlangController@index')->name('verifikasi-pendaftaran.ulang');
    Route::get('/peserta','PesertaController@index')->name('verifikasi-pendaftaran.peserta');
    Route::get('/edit-peserta', 'VerifikasiController@edit')->name('verifikasi-pendaftaran.edit');
    Route::patch('/accept/{register}','PesertaController@store')->name('verifikasi-pendaftaran.accept');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('ambil-form/{register}', 'PaymentController@create')->name('user.ambil-form');
    Route::post('verifikasi-pembayaran/{register}', 'PaymentController@store')->name('user-verifikasi-pembayaran');
});

Route::group(['prefix' => 'pendaftaran'], function(){
    route::get('pending', 'Pendaftaran\PendingController@index')->name('pendaftaran.pending');
    route::get('verified', 'Pendaftaran\VerifiedController@index')->name('pendaftaran.verified');
});

Route::group(['prefix' => 'cetak'], function(){
    route::get('activity', 'Report\ActivityController@index')->name('cetak.activity');
    route::get('data-activity', 'Report\ActivityController@edit')->name('cetak.semua-data.activity');
});