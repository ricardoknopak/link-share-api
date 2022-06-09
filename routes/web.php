<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'bookmarks'], function () use ($router) {
        $router->get('', 'BookmarksController@index');
        $router->get('{id:[\d]+}', 'BookmarksController@show');
        $router->post('', 'BookmarksController@store');
        $router->put('{id:[\d]+}', 'BookmarksController@update');
        $router->delete('{id:[\d]+}', 'BookmarksController@destroy');
    });
    $router->group(['prefix' => 'tags'], function () use ($router) {
        $router->get('', 'TagsController@index');
        $router->get('{id:[\d]+}', 'TagsController@show');
        $router->post('', 'TagsController@store');
        $router->put('{id:[\d]+}', 'TagsController@update');
        $router->delete('{id:[\d]+}', 'TagsController@destroy');
    });
});

$router->post('/api/login', 'TokenController@gerarToken');
$router->post('/api/parse', 'ScrapeHtmlController@parse');