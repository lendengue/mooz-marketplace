<?php

namespace App\Repositories;

use App\Models\Loja;

class LojaRepository extends BaseRepository{

    public function getLojaById($id){
        $query = Loja::select('nome')
            ->where('id',$id)
            ->get();

        return $query;
    }
    
    public function getLojaByUser($id){
        $query = Loja::select('id','nome')
            ->where('id_usuario',$id)
            ->get();

        return $query->toArray();
    }

    public function getLojasByProduto($id){
        $query = Loja::select('tbl_loja.id as id_loja','tbl_loja.nome as nome_loja','lp.valor')
            ->join('tbl_loja_produto as lp','lp.id_loja','=','tbl_loja.id')
            ->join('tbl_produto as p','p.id','=','lp.id_produto')
            ->where('p.id',$id)
            ->orderBy('lp.valor','ASC')
            ->get();

        return $query;
    }

    public function store($input){
        $obj = new Loja();

        $obj->nome = $input['loja'];
        $obj->id_usuario = $input['id_usuario'];
        $obj->save();

        return $obj;
    }

}
