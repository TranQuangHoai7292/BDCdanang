<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/classstudy'], function (Router $router) {
    $router->bind('classstudy', function ($id) {
        return app('Modules\Classstudy\Repositories\ClassstudyRepository')->find($id);
    });
    $router->get('classstudies', [
        'as' => 'admin.classstudy.classstudy.index',
        'uses' => 'ClassstudyController@index',
        'middleware' => 'can:classstudy.classstudies.index'
    ]);
    $router->get('classstudies/create', [
        'as' => 'admin.classstudy.classstudy.create',
        'uses' => 'ClassstudyController@create',
        'middleware' => 'can:classstudy.classstudies.create'
    ]);
    $router->post('classstudies', [
        'as' => 'admin.classstudy.classstudy.store',
        'uses' => 'ClassstudyController@store',
        'middleware' => 'can:classstudy.classstudies.create'
    ]);
    $router->get('classstudies/{classstudy}/edit', [
        'as' => 'admin.classstudy.classstudy.edit',
        'uses' => 'ClassstudyController@edit',
        'middleware' => 'can:classstudy.classstudies.edit'
    ]);
    $router->put('classstudies/{classstudy}', [
        'as' => 'admin.classstudy.classstudy.update',
        'uses' => 'ClassstudyController@update',
        'middleware' => 'can:classstudy.classstudies.edit'
    ]);
    $router->delete('classstudies/{classstudy}', [
        'as' => 'admin.classstudy.classstudy.destroy',
        'uses' => 'ClassstudyController@destroy',
        'middleware' => 'can:classstudy.classstudies.destroy'
    ]);
// append

});
