<?php

namespace App\Http\Controllers;

use App\Reacao;
use Illuminate\Http\Request;

class ReacoesController extends Controller
{
    public function reagir_produto(Request $request){
        $reacao = new Reacao;

        $reacao->id_usuario = $request->id_usuario;
        $reacao->id_produto = $request->id_produto;
        $reacao->save();

        return Reacao::all();
    }

    public function desrreagir_produto(Request $request){
        $reacao = Reacao::find($request->id_reacao);
        $reacao->delete();

        return Reacao::all();
    }

    public function selecionar_reacoes(){
        $reacao = Reacao::all();

        // $dados = [];

        // foreach ($reacao as $index => $reacoes) {
        //     $dados[$index] = [
        //         $reacoes->usuarios,
        //         $reacoes->produtos
        //     ];
        // }

        return $reacao;
    }

    public function selecionar_produtos_adorados(Request $request){
        $dados = Reacao::with('produtos')->where('id_usuario',$request->id_usuario)
        ->get();

        return $dados;
    }
    public function selecionar_reacoes_produto(Request $request){
        $produto = Reacao::where('id_produto', $request->id_produto)->get();
        return $produto;
    }
}
