<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API ROUTE
$router->group(['prefix' => 'api/v1/'], function () use ($router) {

    $router->post('participant', 'ParticipantCtrl@save');
    $router->post('user/login', 'UserCtrl@login');

    // AUTH
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('participant', 'ParticipantCtrl@all');
        $router->get('user/logout', 'UserCtrl@logout');
    });
});
