<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/link'], function (Router $router) {
    $router->bind('link', function ($id) {
        return app('Modules\Link\Repositories\LinkRepository')->find($id);
    });
    $router->get('links', [
        'as' => 'admin.link.link.index',
        'uses' => 'LinkController@index',
        'middleware' => 'can:link.links.index'
    ]);
    $router->get('links/create', [
        'as' => 'admin.link.link.create',
        'uses' => 'LinkController@create',
        'middleware' => 'can:link.links.create'
    ]);
    $router->post('links', [
        'as' => 'admin.link.link.store',
        'uses' => 'LinkController@store',
        'middleware' => 'can:link.links.create'
    ]);
    $router->get('links/{link}/edit', [
        'as' => 'admin.link.link.edit',
        'uses' => 'LinkController@edit',
        'middleware' => 'can:link.links.edit'
    ]);
    $router->put('links/{link}', [
        'as' => 'admin.link.link.update',
        'uses' => 'LinkController@update',
        'middleware' => 'can:link.links.edit'
    ]);
    $router->delete('links/{link}', [
        'as' => 'admin.link.link.destroy',
        'uses' => 'LinkController@destroy',
        'middleware' => 'can:link.links.destroy'
    ]);
// append

});
