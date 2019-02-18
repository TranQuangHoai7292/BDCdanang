<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/tournament'], function (Router $router) {
    $router->bind('tournament', function ($id) {
        return app('Modules\Tournament\Repositories\TournamentRepository')->find($id);
    });
    $router->get('tournaments', [
        'as' => 'admin.tournament.tournament.index',
        'uses' => 'TournamentController@index',
        'middleware' => 'can:tournament.tournaments.index'
    ]);
    $router->get('tournaments/create', [
        'as' => 'admin.tournament.tournament.create',
        'uses' => 'TournamentController@create',
        'middleware' => 'can:tournament.tournaments.create'
    ]);
    $router->post('tournaments', [
        'as' => 'admin.tournament.tournament.store',
        'uses' => 'TournamentController@store',
        'middleware' => 'can:tournament.tournaments.create'
    ]);
    $router->get('tournaments/{tournament}/edit', [
        'as' => 'admin.tournament.tournament.edit',
        'uses' => 'TournamentController@edit',
        'middleware' => 'can:tournament.tournaments.edit'
    ]);
    $router->put('tournaments/{tournament}', [
        'as' => 'admin.tournament.tournament.update',
        'uses' => 'TournamentController@update',
        'middleware' => 'can:tournament.tournaments.edit'
    ]);
    $router->delete('tournaments/{tournament}', [
        'as' => 'admin.tournament.tournament.destroy',
        'uses' => 'TournamentController@destroy',
        'middleware' => 'can:tournament.tournaments.destroy'
    ]);
    $router->bind('news', function ($id) {
        return app('Modules\Tournament\Repositories\NewsRepository')->find($id);
    });
    $router->get('news', [
        'as' => 'admin.tournament.news.index',
        'uses' => 'NewsController@index',
        'middleware' => 'can:tournament.news.index'
    ]);
    $router->get('news/create', [
        'as' => 'admin.tournament.news.create',
        'uses' => 'NewsController@create',
        'middleware' => 'can:tournament.news.create'
    ]);
    $router->post('news', [
        'as' => 'admin.tournament.news.store',
        'uses' => 'NewsController@store',
        'middleware' => 'can:tournament.news.create'
    ]);
    $router->get('news/{news}/edit', [
        'as' => 'admin.tournament.news.edit',
        'uses' => 'NewsController@edit',
        'middleware' => 'can:tournament.news.edit'
    ]);
    $router->put('news/{news}', [
        'as' => 'admin.tournament.news.update',
        'uses' => 'NewsController@update',
        'middleware' => 'can:tournament.news.edit'
    ]);
    $router->delete('news/{news}', [
        'as' => 'admin.tournament.news.destroy',
        'uses' => 'NewsController@destroy',
        'middleware' => 'can:tournament.news.destroy'
    ]);
// append


});
