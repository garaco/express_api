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
    Route::post('edit/user/address', 'UserController@EditDir');
    Route::post('save/orde', 'OrdeController@save');
    Route::post('save/market', 'MarketController@save');
    Route::post('save/service', 'ServiceController@save');
    Route::get('list/all/{id}', 'OrdeController@listAll');
    Route::post('direction/add', 'DirectionController@add');
    Route::get('direction/{id}', 'DirectionController@getByid');
    Route::post('direction/edit', 'DirectionController@edit');
    Route::post('direction/delete', 'DirectionController@delete');
    Route::get('token/{id}/{token}', 'TokenController@generateToken');
    Route::get('notificacion/{id}', 'NotificationController@getNotificacion');
    Route::get('notificacion/count/{id}', 'NotificationController@getCount');
    Route::get('notificacion/leidos/{id}', 'NotificationController@leidos');
});


