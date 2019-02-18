<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/center'], function (Router $router) {
    $router->bind('center', function ($id) {
        return app('Modules\Center\Repositories\CenterRepository')->find($id);
    });
    $router->get('centers', [
        'as' => 'admin.center.center.index',
        'uses' => 'CenterController@index',
        'middleware' => 'can:center.centers.index'
    ]);
    $router->get('centers/create', [
        'as' => 'admin.center.center.create',
        'uses' => 'CenterController@create',
        'middleware' => 'can:center.centers.create'
    ]);
    $router->post('centers', [
        'as' => 'admin.center.center.store',
        'uses' => 'CenterController@store',
        'middleware' => 'can:center.centers.create'
    ]);
    $router->get('centers/{center}/edit', [
        'as' => 'admin.center.center.edit',
        'uses' => 'CenterController@edit',
        'middleware' => 'can:center.centers.edit'
    ]);
    $router->put('centers/{center}', [
        'as' => 'admin.center.center.update',
        'uses' => 'CenterController@update',
        'middleware' => 'can:center.centers.edit'
    ]);
    $router->delete('centers/{center}', [
        'as' => 'admin.center.center.destroy',
        'uses' => 'CenterController@destroy',
        'middleware' => 'can:center.centers.destroy'
    ]);
// append

});
