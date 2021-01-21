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
Route::get('/third/backforyc', 'ThirdController@back4Yc');
Route::get('/third/backforzd', 'ThirdController@back4Zd');
Route::post('/third/wy/user', 'ThirdController@wyNewUser');
Route::post('/third/wy/order', 'ThirdController@wyOrder');
Route::post('/raw/upload', 'RawController@upload');
Route::get('/schedule/clear_visitors', 'ScheduleController@clearVisitors');
Route::get('/fans', 'TestController@fans');

Route::group([
    'middleware' => 'api',
    'namespace' => 'Api',
], function ($router) {
    Route::post('auth/login', 'AuthController@login')->name('login');
});

Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'Api',
], function ($router) {
    Route::get('landing/list', 'LandingController@list');
    Route::get('landing/randWord', 'LandingController@randWord');
    Route::post('landing/updateWord', 'LandingController@updateWords');
});