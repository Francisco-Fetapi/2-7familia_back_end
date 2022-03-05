<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    // public function filhos(){
    //     return $this->hasMany('App\Filho', 'id_usuario', 'id');
    // }
}
