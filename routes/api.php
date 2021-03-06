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

#Routas para User
Route::post('/cadastrar_usuario','UsersController@cadastrar_usuario');
Route::get('/selecionar_usuarios','UsersController@selecionar_usuarios');
Route::post('/selecionar_usuario','UsersController@selecionar_usuario');
Route::post('/verificar_login','UsersController@verificar_login');
Route::post('/mostrar_foto','UsersController@mostrar_foto');
Route::get('/baixar','UsersController@baixar');

#Routas para Produto
Route::post('/add_produto','ProdutosController@add_produto');
Route::post('/deletar_produto','ProdutosController@deletar_produto');
Route::post('/editar_produto','ProdutosController@editar_produto');
Route::get('/selecionar_produtos','ProdutosController@selecionar_produtos');
Route::post('/selecionar_produto','ProdutosController@selecionar_produto');
Route::post('/selecionar_produtos_filtro','ProdutosController@selecionar_produtos_filtro');

#Routas para Encomendas
Route::post('/add_encomenda','EncomendasController@add_encomenda');
Route::post('/eliminar_encomenda','EncomendasController@eliminar_encomenda');
Route::post('/editar_encomenda','EncomendasController@editar_encomenda');
Route::post('/selecionar_encomendas_usuario','EncomendasController@selecionar_encomendas_usuario');
Route::post('/selecionar_produtos_encomendados','EncomendasController@selecionar_produtos_encomendados');
Route::get('/selecionar_encomendas','EncomendasController@selecionar_encomendas');

#Routas para Reações
Route::get('/selecionar_reacoes','ReacoesController@selecionar_reacoes');
Route::post('/reagir_produto','ReacoesController@reagir_produto');
Route::post('/desrreagir_produto','ReacoesController@desrreagir_produto');
Route::post('/selecionar_produtos_adorados','ReacoesController@selecionar_produtos_adorados');
Route::post('/selecionar_reacoes_produto','ReacoesController@selecionar_reacoes_produto');

#Rotas para Admin
Route::post('/verificar_login_admin','AdminsControllers@verificar_login');
Route::post('/cadastrar_admin','AdminsControllers@cadastrar');
Route::get('/selecionar_admins','AdminsControllers@selecionar_admins');

#Rotas para Comentários
Route::post('/comentar','ComentariosController@comentar');
Route::post('/selecionar_comentarios_produto','ComentariosController@selecionar_comentarios_produto');

#Rotas para Mensagens
Route::post('/enviar_mensagem','MensagensController@enviar_mensagem');
Route::get('/selecionar_mensagens','MensagensController@selecionar_mensagem');

#Rotas para Categoria
Route::post('/add_categoria', 'CategoriasController@add_categoria');
