<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get("/api/task","TaskController@getAll");

$router->group(['prefix' => "/api/task"],function() use ($router){
    $router->get("/{id}","TaskController@get");
    $router->post("/","TaskController@store");
    $router->put("/{id}","TaskController@update");
    $router->delete("/{id}","TaskController@destroy");
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
