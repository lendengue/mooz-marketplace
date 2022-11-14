<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository extends BaseRepository{

    public function store($input){
        $obj = new Usuario();

        $obj->nome = $input['nome'];
        $obj->email = $input['email'];
        $obj->senha = $input['senha'];
        $obj->save();

        return $obj;
    }

}
