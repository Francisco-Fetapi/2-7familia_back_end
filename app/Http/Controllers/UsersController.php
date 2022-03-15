<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function cadastrar_usuario(Request $request){
        $user = new User;

        #Verificando se já existe o e-mail do usuário em questão
        if($user::all()->where('email','=',$request->email)->first()) return 'E-mail já existente';
        #Se não, então pode cadastra-lo
        else{
            $user->nome_usuario = $request->nome_usuario;
            $user->email = $request->email;
            $user->data_nascimento = $request->data_nascimento;
            $user->sexo = $request->sexo;
            #Encriptando a senha, o 1º parametro é o valor a ser encriptado e o 2º é uma string
            $user->senha = crypt($request->senha, 'senha_user');

            if($request->file('foto')){
                $path = Storage::disk('public')->put('/uploads', $request->file('foto'));
                $user->foto_user = $path;
            }else $user->foto_user = 'uploads/user.jpg';
            $user->save();

            return $user->id;
        }
    }

    public function verificar_login(Request $request){
        $user = User::all();
        #Criptografando a senha do usuario para verificar com a do banco de dados
        $senha = crypt($request->senha, 'senha_user');

        if($user_logado = $user->where('email','=',$request->email)->where('senha','=',$senha)->first()){
            return $user_logado->id;
        }else{
            return 'Usuário não encontrado';
        }
    }

    public function selecionar_usuarios(){
        $user = User::all();

        return $user;
    }

    public function mostrar_foto(Request $request){
        if($request->file('foto')){
            $path = Storage::disk('public')->put('/uploads', $request->file('foto'));

            return asset($path);
        }else return 'Não mandaste nada';
    }

    public function baixar(Request $request){
        // return Storage::disk('public')->download('uploads/rieTdTIxZqRpklpI43O6fILkwsrf1rJ4Cq8aXm1J.png');

        return response()->download(public_path('uploads/user.jpg'));
    }
}
