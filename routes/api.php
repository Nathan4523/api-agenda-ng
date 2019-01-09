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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('lista-todos-contatos', 'AgendaController@index');

Route::get('lista-por-id/{id}', 'AgendaController@show');

Route::post('cadastrar-contato', 'AgendaController@store');

Route::put('altarar-contato/{id}', 'AgendaController@update');