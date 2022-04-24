<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function add_categoria(Request $request){
        $categoria = new Categoria;
        $categoria->nome_categoria = $request->nome;
        $categoria->tipo = $request->tipo;
        $categoria->save();

        return Categoria::all();
    }
}
