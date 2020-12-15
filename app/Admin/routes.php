<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/post_back', 'HomeController@postBack');
    $router->get('/supply', 'HomeController@supply');
    $router->resource('/random_mps', 'RandomMpController');
    $router->resource('/official', 'OfficialController');
    $router->resource('/domain', 'DomainController');
    $router->resource('/landing', 'LandingController');
    $router->post('/page/copy', 'TouTiaoController@copy');
    $router->resource('/toutiao', 'TouTiaoController');
    $router->resource('/mps', 'MpController');
    $router->resource('/huasheng', 'HuaShengController');
    $router->resource('/baidu_clue', 'BaiduClueController');
    $router->resource('/templates', 'TemplateController');
    $router->resource('/visitors', 'VisitorController');
    $router->resource('/raws', 'RawController');
    $router->post('/api/post_back/baidu', 'PostBackController@baidu');
    $router->post('/api/post_back/toutiao', 'PostBackController@toutiao');
    $router->get('/api/get_supply', 'PostBackController@getSupplyList');
    $router->post('/api/supply', 'PostBackController@supply');
    $router->post('/api/supply/upload', 'PostBackController@upload');
});
