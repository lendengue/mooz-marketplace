<?php

namespace App\Http\Controllers;

use App\Repositories\LojaProdutoRepository;
use App\Repositories\LojaRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\UsuarioRepository;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LojaController extends Controller{

    public function __construct(LojaProdutoRepository $lpr, LojaRepository $lr, ProdutoRepository $pr, UsuarioRepository $ur){
        $this->lp_repository = $lpr;
        $this->loja_repository = $lr;
        $this->produto_repository = $pr;
        $this->usuario_repository = $ur;
    }

    public function loja(){
        if(!Auth::check()){ return redirect()->route('login'); }
        $id_usuario = auth()->user()->id;

        $loja = $this->loja_repository->getLojaByUser($id_usuario);
        $produtos_loja = $this->produto_repository->getProdutosByLoja($loja[0]['id']);

        return view('usuario.minha-loja',[
            'loja' => $loja[0],
            'produtos_loja' => $produtos_loja
        ]);
    }

    public function lojaProduto(){
        if(!Auth::check()){ return redirect()->route('login'); }
        $produtos = $this->produto_repository->getAllProdutos();

        return view('usuario.cadastro-anuncio',[
            'produtos' => $produtos
        ]);
    }

    public function cadastroLojaProduto(Request $r){
        if(!Auth::check()){ return redirect()->route('login'); }
        $r['id_loja'] = $this->loja_repository->getLojaByUser(auth()->user()->id)[0]['id'];
        
        $this->lp_repository->store($r);

        return redirect()->back()->with(['success' => 'Cadastro realizado com sucesso.']);
    }

    public function produto(){
        if(!Auth::check()){ return redirect()->route('login'); }

        return view('usuario.cadastro-produto');
    }

    public function cadastroProduto(Request $r){
        if(!Auth::check()){ return redirect()->route('login'); }

        $path = $r->file('img')->getRealPath();
        $imagem = file_get_contents($path);
        
        $r['imagem'] = $imagem;

        $this->produto_repository->store($r);

        return redirect()->back()->with(['success' => 'Cadastro realizado com sucesso.']);
    }



}
