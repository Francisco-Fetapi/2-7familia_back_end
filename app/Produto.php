<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public function categoria(){
        return $this->hasOne('App\Categoria','id','id_categoria');
    }
}
