<?php

namespace App\Http\Controllers;

use App\Encomenda;
use Illuminate\Http\Request;

class EncomendasController extends Controller
{
    public function add_encomenda(Request $request){

        $encomenda = new Encomenda;

        $encomenda->id_usuario = $request->id_usuario;
        $encomenda->id_produto = $request->id_produto;
        $encomenda->quantidade = $request->quantidade;
        $encomenda->data_entrega = $request->data_entrega;
        $encomenda->save();

        return Encomenda::with('produtos')->where('id_usuario',1)->get();
    }
    public function eliminar_encomenda(Request $request){
        $encomenda = Encomenda::find($request->id);
        $encomenda->delete();
        return Encomenda::all();
    }
    public function selecionar_encomendas(){
        $encomendas = Encomenda::all();
        return  $encomendas;
    }
}
