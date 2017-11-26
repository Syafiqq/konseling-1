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
            $router->post('/register', ['middleware' => 'auth.role.counselor', 'uses' => 'Auth@registerStore', 'as' => 'counselor.auth.register.store']);
            $router->get('/login', ['uses' => 'Auth@getLogin', 'as' => 'counselor.auth.login.get']);
            $router->post('/login', ['middleware' => 'auth.role.counselor', 'uses' => 'Auth@postLogin', 'as' => 'counselor.auth.login.post']);
        });
    });
});
