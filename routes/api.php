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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cadastrar_usuario','UsersController@cadastrar');
Route::get('/selecionar_usuario','UsersController@selecionar');
Route::get('/condicao','UsersController@condicao');
Route::post('/selecionar_usuario_filhos','UsersController@selecionar_filhos');
Route::post('/verificar_login','UsersController@verificar_login');
Route::post('/enviar_foto','UsersController@enviarFoto');
Route::get('/baixar','UsersController@baixar');

