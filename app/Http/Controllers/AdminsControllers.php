<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsControllers extends Controller
{
    public function cadastrar(Request $request){
        $admin = new Admin;

        #Verificando se já existe o e-mail do admin em questão
        if($admin::all()->where('email','=',$request->email)->first()) return 'E-mail já existente';
        #Se não, então pode cadastra-lo

        else{
            $admin->nome_admin = $request->nome_admin;
            $admin->email = $request->email;

            #Encriptando o código, o 1º parametro é o valor a ser encriptado e o 2º é uma string
            $admin->codigo = crypt($request->codigo, 'codigo_admin');
            $admin->save();

            return $admin->id;
        }
    }
    public function verificar_login(Request $request){
        $admin = Admin::all();

        #Criptografando o codigo do admin
        $codigo = crypt($request->codigo,'codigo_admin');

        if($admin_logado = $admin->where('email','=',$request->email)->where('codigo','=',$codigo)->first()){
            return $admin_logado->id;
        }else return 'Admin não encontrado';
    }
    public function selecionar_admins(){
        $admins = Admin::all();
        return $admins;
    }
}
