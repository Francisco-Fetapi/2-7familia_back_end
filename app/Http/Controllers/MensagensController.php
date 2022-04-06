<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;

class MensagensController extends Controller
{
    public function enviar_mensagem(Request $request){
        $mensagem = new Mensagem;
        $mensagem->id_usuario = $request->id_usuario;
        $mensagem->conteudo = $request->conteudo;
        $mensagem->save();

        return Mensagem::all();
    }

    public function selecionar_mensagem(){
        $mensagems = Mensagem::with('usuarios')->get();
        return $mensagems;
    }
}
