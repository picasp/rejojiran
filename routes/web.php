<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/article', 'article')->name('article');
    Route::get('/user', 'user')->name('user');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('/myartikel', \App\Http\Controllers\myArtikel::class);
Route::resource('/article', \App\Http\Controllers\ArticleController::class);
Route::resource('/user', \App\Http\Controllers\UserController::class);
Route::resource('/list_user', \App\Http\Controllers\ListUserController::class);

Route::resource('/bidang', \App\Http\Controllers\BidangController::class);
Route::get('/bidang', 'App\Http\Controllers\BidangController@index')->name('bidang.index');
Route::get('/bidang/{id}/edit', 'App\Http\Controllers\BidangController@edit')->name('bidang.edit');
Route::put('/bidang/{id}', 'App\Http\Controllers\BidangController@update')->name('bidang.update');

Route::resource('/jurusan', \App\Http\Controllers\JurusanController::class);
Route::get('/jurusan', 'App\Http\Controllers\JurusanController@index')->name('jurusan.index');
Route::get('/jurusan/{id}/edit', 'App\Http\Controllers\JurusanController@edit')->name('jurusan.edit');
Route::put('/jurusan/{id}', 'App\Http\Controllers\JurusanController@update')->name('jurusan.update');

Route::get('/api/jurusan/{bidangId}', 'App\Http\Controllers\UserController@getJurusanByBidang');
Route::get('/api/artikel', 'App\Http\Controllers\UserController@filterArtikel');
