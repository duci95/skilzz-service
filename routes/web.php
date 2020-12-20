<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});
//category
$router->get('categories','CategoryController@index');
$router->post('categories','CategoryController@store');

//user
$router->post('register','UserController@register');

//question
$router->get('questions/{id}','QuestionController@show');
