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

$router->get('product', '\App\Http\Controllers\ProductController@index');
$router->get('product/{id}', '\App\Http\Controllers\ProductController@show');

$router->post('product/{id}', '\App\Http\Controllers\ProductController@update');
$router->post('product', '\App\Http\Controllers\ProductController@store');

$router->delete('product/{id}', '\App\Http\Controllers\ProductController@destroy');
