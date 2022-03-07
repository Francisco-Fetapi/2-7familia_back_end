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
Route::post('/mostrar_foto','UsersController@mostrar_foto');
Route::get('/baixar','UsersController@baixar');

Route::post('/add_produto','ProdutosController@cadastrar');
Route::post('/deletar_produto','ProdutosController@deletar_produto');
Route::get('/selecionar_produtos','ProdutosController@selecionar_produtos');

