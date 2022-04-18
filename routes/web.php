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

use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    return "no data";
});

Route::post('/v1/endpoint', function (\Illuminate\Http\Request $request) {
    $handler = new \App\Http\Controllers\JsonRpcController();
    return $handler($request, [\App\Http\Procedures\CounterProcedure::class]);
});