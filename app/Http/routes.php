<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/** @var \Illuminate\Routing\Router $router */
$router->get('/', ['middleware' => 'guest', 'as' => 'root', 'uses' => 'WelcomeController@index']);
$router->group(['prefix' => '/template', 'middleware' => 'debug'], function () use ($router) {
    $router->get('/boilerplate', 'TemplateController@boilerplate');
    $router->get('/bootstrap', 'TemplateController@bootstrap');
    $router->get('/adminlte', 'TemplateController@adminlte');
});
$router->group(['namespace' => 'Counselor', 'prefix' => '/counselor'], function () use ($router) {
    $router->group(['prefix' => '/auth'], function () use ($router) {
        $router->group(['middleware' => 'guest'], function () use ($router) {
            $router->get('/register', ['uses' => 'Auth@registerCreate', 'as' => 'counselor.auth.register.create']);
            $router->post('/register', ['middleware' => 'auth.role', 'uses' => 'Auth@registerStore', 'as' => 'counselor.auth.register.store']);
            $router->get('/login', ['uses' => 'Auth@getLogin', 'as' => 'counselor.auth.login.get']);
            $router->post('/login', ['middleware' => 'auth.role', 'uses' => 'Auth@postLogin', 'as' => 'counselor.auth.login.post']);
        });
    });
    $router->group(['middleware' => 'authenticated.source'], function () use ($router) {
        $router->get('/auth/logout', ['uses' => 'Auth@getLogout', 'as' => 'counselor.auth.logout']);
        $router->get('/dashboard', ['uses' => 'Home@index', 'as' => 'counselor.home.dashboard']);
        $router->get('/profile', ['uses' => 'Profile@edit', 'as' => 'counselor.profile.edit']);
        $router->patch('/profile', ['uses' => 'Profile@update', 'as' => 'counselor.profile.update']);
        $router->get('/coupon/generate', ['uses' => 'Home@couponGenerator', 'as' => 'counselor.coupon.generator']);
        $router->get('/report', ['uses' => 'Report@index', 'as' => 'counselor.report.list']);
        $router->patch('/report/student/{id}/activate', ['middleware' => 'valid.student', 'uses' => 'Report@activation', 'as' => 'counselor.student.activation'])->where('id', '[0-9]+');
        $router->get('/report/student/{id}/detail', ['middleware' => ['valid.student', 'valid.student.report.detail'], 'uses' => 'Report@detail', 'as' => 'counselor.student.detail'])->where('id', '[0-9]+');
    });
});
$router->group(['namespace' => 'Student', 'prefix' => '/student'], function () use ($router) {
    $router->group(['prefix' => '/auth'], function () use ($router) {
        $router->group(['middleware' => 'guest'], function () use ($router) {
            $router->get('/register', ['uses' => 'Auth@registerCreate', 'as' => 'student.auth.register.create']);
            $router->post('/register', ['middleware' => 'auth.role', 'uses' => 'Auth@registerStore', 'as' => 'student.auth.register.store']);
            $router->get('/login', ['uses' => 'Auth@getLogin', 'as' => 'student.auth.login.get']);
            $router->post('/login', ['middleware' => 'auth.role', 'uses' => 'Auth@postLogin', 'as' => 'student.auth.login.post']);
        });
    });
    $router->group(['middleware' => 'authenticated.source'], function () use ($router) {
        $router->get('/auth/logout', ['uses' => 'Auth@getLogout', 'as' => 'student.auth.logout']);
        $router->get('/dashboard', ['uses' => 'Home@index', 'as' => 'student.home.dashboard']);
        $router->get('/profile', ['uses' => 'Profile@edit', 'as' => 'student.profile.edit']);
        $router->patch('/profile', ['uses' => 'Profile@update', 'as' => 'student.profile.update']);
    });
});
