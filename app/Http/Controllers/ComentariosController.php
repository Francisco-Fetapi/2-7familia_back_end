<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function comentar(Request $request){
        $comentario = new Comentario;
        $comentario->id_usuario = $request->id_usuario;
        $comentario->id_produto = $request->id_produto;
        $comentario->comentario = $request->comentario;

        $comentario->save();

        $comentarios = Comentario::with('usuarios')->where('id_produto', $request->id_produto)->get();

        return $comentarios;

    }
    public function selecionar_comentarios_produto(Request $request){
        $comentarios = Comentario::with('usuarios')->where('id_produto', $request->id_produto)->get();
        return $comentarios;
    }
}
