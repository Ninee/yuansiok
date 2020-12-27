<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', 'TestController@index');
Route::get('/budan', 'TestController@budan');
Route::get('/budan_by_id', 'TestController@budanById');
Route::get('/test/baidu/{id}', 'TestController@baidu');
Route::post('/visitor/save', 'VisitorController@save');
Route::post('/baidu/debug', 'BaiduController@debug');
Route::get('/third/backforhs', 'ThirdController@back4Hs');
Route::post('/third/wy/user', 'ThirdController@wyNewUser');
Route::post('/third/wy/order', 'ThirdController@wyOrder');
Route::post('/raw/upload', 'RawController@upload');