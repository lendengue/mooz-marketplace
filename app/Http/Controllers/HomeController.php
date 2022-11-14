<?php

namespace App\Http\Controllers;

use App\Repositories\LojaProdutoRepository;
use App\Repositories\LojaRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\UsuarioRepository;
use Facade\FlareClient\Http\Response;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(LojaProdutoRepository $lpr, LojaRepository $lr, ProdutoRepository $pr, UsuarioRepository $ur){
        $this->lp_repository = $lpr;
        $this->loja_repository = $lr;
        $this->produto_repository = $pr;
        $this->usuario_repository = $ur;
    }

    public function index(){
        $produtos_loja = $this->lp_repository->index();

        return view('index',[
            'produtos_loja' => $produtos_loja
        ]);
    }

    public function produto($id_produto, $id_loja = null){
        $produto = $this->produto_repository->getProdutoById($id_produto);
        $lojas_com_produto = $this->loja_repository->getLojasByProduto($id_produto);

        $preco_loja = $this->lp_repository->getPrecoProdutoByLoja($id_produto,$id_loja);

        if(empty($preco_loja)){
            $preco_loja = $this->lp_repository->getMenorPrecoByProduto($id_produto);
            $vendedor = [];
        }else{
            $vendedor = $this->loja_repository->getLojaById($id_loja);
            $vendedor = $vendedor->toArray();
        }
        return view('produto',[
            'produto' => $produto[0],
            'lojas_com_produto' => $lojas_com_produto,
            'preco_loja' => $preco_loja[0],
            'vendedor' => $vendedor
        ]);
    }

    public function loja($id){
        $loja = $this->loja_repository->getLojaById($id);
        $produtos_loja = $this->produto_repository->getProdutosByLoja($id);

        return view('loja',[
            'loja' => $loja[0],
            'produtos_loja' => $produtos_loja
        ]);
    }

    public function login(){
        return view('login');
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function postCadastro(Request $r){
        $usuario = $this->usuario_repository->store($r);
        $r['id_usuario'] = $usuario['id'];
        $this->loja_repository->store($r);

        return redirect()->back()->with(['success' => 'Cadastro realizado com sucesso.']);
    }

}
