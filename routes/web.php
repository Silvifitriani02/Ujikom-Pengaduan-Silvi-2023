<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/beranda', 'BerandaController@index')->name('beranda');


Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@logout')->name('logout')->middleware('auth');


// Route::group(['middleware' => ['auth', 'role:admin,user', 'revalidate']],function (){

//         Route::get('/home', function () {
//             return view('home');
//         })->middleware('auth')->name('home');

//     });

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/pengaduan/create', 'PengaduanController@create')->name('create')->middleware('auth');
    Route::post('/pengaduan/store', 'PengaduanController@store')->middleware('auth');
    Route::get('/history', 'MasyarakatController@historyPengaduan')->name('history');
    Route::get('/history/show/{id}', 'MasyarakatController@detailHistory');
    Route::get('/history/destroy/{id}', 'MasyarakatController@destroy')->middleware('auth'); 
});


Route::group(['middleware' => ['auth', 'role:admin,petugas']], function () {
    Route::get('/beranda', 'BerandaController@index')->name('beranda')->middleware('auth');
// Pengaduan
Route::get('/pengaduan','PengaduanController@index')->name('pengaduan');
// Route::get('/pengaduan/create', 'PengaduanController@create');
// Route::post('/pengaduan/store', 'PengaduanController@store');
Route::get('/pengaduan/status/{id}', 'PengaduanController@status');
Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit');
Route::put('/pengaduan/update/{id}', 'PengaduanController@update');
Route::get('/pengaduan/show/{id}', 'PengaduanController@show');
Route::get('/pengaduan/destroy/{id}', 'PengaduanController@destroy');
// Route::get('/cetak-pengaduan','PengaduanController@cetakpengaduan')->name('cetak-pengaduan')->middleware('auth');

// Tanggapan
Route::get('/tanggapan', 'TanggapanController@index')->name('tanggapan');
Route::get('/tanggapan/create', 'TanggapanController@create');
Route::post('/tanggapan/store', 'TanggapanController@store');
Route::get('/tanggapan/edit/{id}', 'TanggapanController@edit');
Route::put('/tanggapan/update/{id}', 'TanggapanController@update');
Route::get('/tanggapan/destroy/{id}', 'TanggapanController@destroy');
});

//Userprofil
Route::get('user_profile', 'UserprofilController@index')->name('user_profile');
Route::get('user_profile/edit/{id}','UserprofilController@edit')->name('user_profile.edit');
Route::put('user_profile/{id}','UserprofilController@update')->name('user_profile.update');
Route::post('getKota', 'UserprofilController@getKota')->name('getKota');//getkota
Route::post('getKecamatan', 'UserprofilController@getKecamatan')->name('getKecamatan');//getkemacatan
Route::post('getKelurahan', 'UserprofilController@getKelurahan')->name('getKelurahan'); //getkelurahan

//reset
Route::get('password/reset','UserprofilController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'UserprofilController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'UserprofilController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserprofilController@reset')->name('password.update');

//history

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('cetak-pengaduan', 'PengaduanController@cetakpengaduan')->name('cetak-pengaduan')->middleware('auth');
//admin
Route::get('/user','DatauserController@index')->name('userEdit');
Route::get('/user/edit/{id}', 'DatauserController@edit');
Route::put('/user/update/{id}', 'DatauserController@update');
Route::get('/user/destroy/{id}', 'DatauserController@destroy');
});
