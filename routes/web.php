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

Route::get('/', 'HomeController@index');

Route::get('/danhsach','HomeController@index');

Route::post('search', 'HomeController@search');

Route::get('/show-edit', 'HomeController@show_edit');

Route::resource('/edit', 'EditController');

Route::get('/delete/{id}', 'EditController@destroy');

Route::get('/chinhsua/{id}', 'EditController@edit');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
