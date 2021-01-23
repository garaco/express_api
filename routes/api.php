<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['api.auth']], function () {
    Route::get('login/{token}', 'UserController@index');
    Route::get('generate/{token}/{email}', 'UserController@sendToken');
    Route::get('sendEmail/{email}/{token}', 'UserController@email');
    Route::post('register', 'UserController@register');
    Route::post('edit/user', 'UserController@Edit');
    Route::post('save/orde', 'OrdeController@save');
    Route::post('save/market', 'MarketController@save');
    Route::post('save/service', 'ServiceController@save');
});


