<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;
use \App\Http\Controllers\CategoryController;


$router->get('/', function () use ($router) {
    return $router->app->version();
});
//category
$router->get('categories','CategoryController@index');

//user
$router->post('register','UserController@register');
