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

//Route::get('/{slug}', 'IndexController@index')->name('index');
//Route::get('/', 'IndexController@baidu')->name('baidu');
//Route::get('/toutiao/{id}', 'IndexController@toutiao');
Route::get('/pc/{suffix?}', 'IndexController@pc')->name('pc');
Route::get('/{suffix?}', 'IndexController@template')->name('template');