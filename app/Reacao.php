<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reacao extends Model
{
    protected $table = 'reacaos';

    public function usuarios(){
        return $this->hasOne('App\User','id','id_usuario');
    }
    public function produtos(){
        return $this->hasOne('App\Produto','id','id_produto');
    }
}
