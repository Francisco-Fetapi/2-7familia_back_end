<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsControllers extends Controller
{
    public function verificar_login(Request $request){
        $admin = Admin::all();

        #Criptografando o codigo do admin
        $codigo = crypt($request->codigo,'codigo_admin');

        if($admin_logado = $admin->where('email','=',$request->email)->where('codigo','=',$codigo)->first()){
            return $admin_logado->id;
        }else return 'Admin não encontrado';
    }
}
