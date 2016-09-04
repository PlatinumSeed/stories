<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    //authentication
    $api->post('authenticate', 'App\Http\Controllers\API\V1\Auth\AuthenticateController@authenticate');
    $api->post('logout', 'App\Http\Controllers\API\V1\Auth\AuthenticateController@logout');
    $api->get('token', 'App\Http\Controllers\API\V1\Auth\AuthenticateController@getToken');
    //stories
    $api->get('stories/{id}', 'App\Http\Controllers\API\V1\StoriesController@index');
    //fragments
    $api->get('fragments', 'App\Http\Controllers\API\V1\FragmentsController@index');
    $api->post('fragments', 'App\Http\Controllers\API\V1\FragmentsController@store');
    $api->delete('fragments/{id}', 'App\Http\Controllers\API\V1\FragmentsController@destroy');

});
