<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/club'], function (Router $router) {
    $router->bind('club', function ($id) {
        return app('Modules\Club\Repositories\ClubRepository')->find($id);
    });
    $router->get('clubs', [
        'as' => 'admin.club.club.index',
        'uses' => 'ClubController@index',
        'middleware' => 'can:club.clubs.index'
    ]);
    $router->get('clubs/create', [
        'as' => 'admin.club.club.create',
        'uses' => 'ClubController@create',
        'middleware' => 'can:club.clubs.create'
    ]);
    $router->post('clubs', [
        'as' => 'admin.club.club.store',
        'uses' => 'ClubController@store',
        'middleware' => 'can:club.clubs.create'
    ]);
    $router->get('clubs/{club}/edit', [
        'as' => 'admin.club.club.edit',
        'uses' => 'ClubController@edit',
        'middleware' => 'can:club.clubs.edit'
    ]);
    $router->put('clubs/{club}', [
        'as' => 'admin.club.club.update',
        'uses' => 'ClubController@update',
        'middleware' => 'can:club.clubs.edit'
    ]);
    $router->delete('clubs/{club}', [
        'as' => 'admin.club.club.destroy',
        'uses' => 'ClubController@destroy',
        'middleware' => 'can:club.clubs.destroy'
    ]);
// append

});
