<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    public function add_produto(Request $request){
        $produtos = new Produto;
        $produtos->nome_produto = $request->nome_produto;
        $produtos->preco = $request->preco;
        $produtos->categoria = $request->categoria;
        $produtos->descricao = $request->descricao;
        $path = Storage::disk('public')->put('/uploads', $request->file('foto'));
        $produtos->foto_produto = $path;

        $produtos->save();
    }
    public function editar_produto(Request $request){
        $produtos = Produto::find($request->id_produto);
        $produtos->nome_produto = $request->nome_produto;
        $produtos->preco = $request->preco;
        $produtos->categoria = $request->categoria;
        $produtos->descricao = $request->descricao;

        if($request->file('foto')){
            $path = Storage::disk('public')->put('/uploads', $request->file('foto'));
            $produtos->foto_produto = $path;
        }

        $produtos->save();
    }
    public function selecionar_produtos(){
        $produtos = Produto::all();
        return $produtos;
    }

    public function deletar_produto(Request $request){
        $produto = Produto::find($request->id_produto);
        if($produto) {
            $produto->delete();
            return Produto::all();
        }else return 'Produto não encontrado';
    }
}
