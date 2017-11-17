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
$router->get('/', ['as' => 'root', 'uses' => 'WelcomeController@index']);
$router->group(['prefix' => '/template', 'middleware' => 'debug'], function () use ($router) {
    $router->get('/boilerplate', 'TemplateController@boilerplate');
    $router->get('/bootstrap', 'TemplateController@bootstrap');
    $router->get('/adminlte', 'TemplateController@adminlte');
});
