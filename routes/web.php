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
//     return view('layout');
// });
Route::get('/','SyaratController@index');
Route::resource('syarat','SyaratController');
Route::resource('prosedur','ProsedurController');
Route::resource('datakriteria','DatakriteriaController');
Route::resource('antarkriteria','AntarkriteriaController');
Route::resource('userdata','UserController');
Route::resource('rasio','IndeksrasioController');
Route::resource('alternatif','AlternatifController');
Route::resource('nilaireal','NilairealController');
Route::resource('walternatif','EigenalternatifController');

Route::get('pendaftaran','AlternatifController@create');
Route::get('eigenkriteria','EigenalternatifController@eigenkriteria');
Route::get('alternatifkriteria','EigenalternatifController@alterkriteria');
Route::get('rekomendasi','EigenalternatifController@rekomendasi');
Route::get('pdf/{id}','AlternatifController@pdf');
Route::get('cek','AlternatifController@cek');
Route::get('peserta','UserController@peserta');
Route::get('mahasiswa/{id}','UserController@show');
Route::get('pdfrekomendasi','EigenalternatifController@pdfrekomendasi');
Route::get('weighting/eigen','AntarkriteriaController@eigen')->name('weighting.eigen');
Route::get('tambahuser','UserController@create');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('detail/{id}','UserController@detailpdf');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'UserController@autoComplete'));
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'UserController@peserta'));