<?php

namespace App\Http\Controllers;

use App\Encomenda;
use Illuminate\Http\Request;

class EncomendasController extends Controller
{
    public function selecionar_encomendas(){
        $encomendas = Encomenda::all();
        return $encomendas;
    }
}
