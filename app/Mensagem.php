<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagems';

    public function usuarios(){
        return $this->belongsTo('App\User','id_usuario','id');
    }
}
