<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoRepository extends BaseRepository{

    public function getAllProdutos(){
        $query = Produto::select('id','nome','img')
            ->get();

        return $query;
    }
    public function getProdutoById($id){
        $query = Produto::select('nome','img')
            ->where('id',$id)
            ->get();

        $query = $query->toArray();
        return $query;
    }

    public function getProdutosByLoja($id){
        $query = Produto::select('tbl_produto.id as id_produto','tbl_produto.nome as nome_produto','tbl_produto.img','lp.valor')
            ->join('tbl_loja_produto as lp','lp.id_produto','=','tbl_produto.id')
            ->join('tbl_loja as l','l.id','=','lp.id_loja')
            ->where('l.id',$id)
            ->orderBy('nome_produto')
            ->get();

        return $query;
    }

    public function store($input){
        $obj = new Produto();
        
        $obj->nome = $input['nome'];
        $obj->img = $input['imagem'];
        $obj->save();

        return $obj;
    }

    
}
