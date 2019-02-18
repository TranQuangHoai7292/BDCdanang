<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/student'], function (Router $router) {
    $router->bind('student', function ($id) {
        return app('Modules\Student\Repositories\StudentRepository')->find($id);
    });
    $router->get('students', [
        'as' => 'admin.student.student.index',
        'uses' => 'StudentController@index',
        'middleware' => 'can:student.students.index'
    ]);
    $router->get('students/create', [
        'as' => 'admin.student.student.create',
        'uses' => 'StudentController@create',
        'middleware' => 'can:student.students.create'
    ]);
    $router->post('students', [
        'as' => 'admin.student.student.store',
        'uses' => 'StudentController@store',
        'middleware' => 'can:student.students.create'
    ]);
    $router->get('students/{student}/edit', [
        'as' => 'admin.student.student.edit',
        'uses' => 'StudentController@edit',
        'middleware' => 'can:student.students.edit'
    ]);
    $router->put('students/{student}', [
        'as' => 'admin.student.student.update',
        'uses' => 'StudentController@update',
        'middleware' => 'can:student.students.edit'
    ]);
    $router->delete('students/{student}', [
        'as' => 'admin.student.student.destroy',
        'uses' => 'StudentController@destroy',
        'middleware' => 'can:student.students.destroy'
    ]);
// append

});
