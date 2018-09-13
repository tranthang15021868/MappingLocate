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

//annh
Route::resource('hanbaiki', 'HanbaikiController');
Route::resource('konbini', 'KonbiniController');
//end annh
Route::resource('office', 'PostBoxesController');

Route::resource('test', 'TestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
