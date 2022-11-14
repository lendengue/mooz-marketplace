<?php

namespace App\Repositories;

use App\Models\LojaProduto;
use Illuminate\Support\Facades\DB;

class LojaProdutoRepository extends BaseRepository{

    public function index(){
        $query = LojaProduto::select('tbl_loja_produto.id','p.id as id_produto','p.nome as nome_produto','p.img','l.id as id_loja','l.nome as nome_loja','tbl_loja_produto.valor')
            ->join('tbl_loja as l','l.id','=','tbl_loja_produto.id_loja')
            ->join('tbl_produto as p','p.id','=','tbl_loja_produto.id_produto')
            ->orderBy('tbl_loja_produto.data_alteracao','DESC')
            ->get();
        // $resultado = $query->toArray();
        return $query;
    }

    public function getPrecoProdutoByLoja($id_produto,$id_loja){
        $query = LojaProduto::select('valor')
            ->where('id_loja',$id_loja)
            ->where('id_produto',$id_produto)
            ->get();

        $query = $query->toArray();
        return $query;
    }

    public function getMenorPrecoByProduto($id_produto){
        $query = LojaProduto::select('valor')
            ->where('id_produto',$id_produto)
            ->orderBy('valor','ASC')
            ->get();
        
        $query = $query->toArray();
        return $query;
    }

    public function store($input){
        $obj = new LojaProduto();

        $obj->id_loja = $input['id_loja'];
        $obj->id_produto = $input['id_produto'];
        $obj->valor = $input['valor'];
        $obj->data_cadastro = date("Y-m-d h:i:s");
        $obj->data_alteracao = date("Y-m-d h:i:s");
        $obj->save();

        return $obj;
    }


}