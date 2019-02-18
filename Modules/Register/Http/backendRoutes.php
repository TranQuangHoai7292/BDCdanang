<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/register'], function (Router $router) {
    $router->bind('register', function ($id) {
        return app('Modules\Register\Repositories\RegisterRepository')->find($id);
    });
    $router->get('registers', [
        'as' => 'admin.register.register.index',
        'uses' => 'RegisterController@index',
        'middleware' => 'can:register.registers.index'
    ]);
    $router->get('registers/create', [
        'as' => 'admin.register.register.create',
        'uses' => 'RegisterController@create',
        'middleware' => 'can:register.registers.create'
    ]);
    $router->post('registers', [
        'as' => 'admin.register.register.store',
        'uses' => 'RegisterController@store',
        'middleware' => 'can:register.registers.create'
    ]);
    $router->get('registers/{register}/edit', [
        'as' => 'admin.register.register.edit',
        'uses' => 'RegisterController@edit',
        'middleware' => 'can:register.registers.edit'
    ]);
    $router->put('registers/{register}', [
        'as' => 'admin.register.register.update',
        'uses' => 'RegisterController@update',
        'middleware' => 'can:register.registers.edit'
    ]);
    $router->delete('registers/{register}', [
        'as' => 'admin.register.register.destroy',
        'uses' => 'RegisterController@destroy',
        'middleware' => 'can:register.registers.destroy'
    ]);
    $router->post('register/get_info',[
        'as'    =>  'register.get_info',
        'uses'  =>  'RegisterController@get_info'
    ]);
// append

});
