@extends('template.layout')

@section('conteudo')
    <section class="produtos">
        <div class="bg-conteudo">
            <article class="produto-show">
                <div class="container">
                    <div class="form-signin-heading text-center">
                        @if (\Session::has('success'))
                            <div class="alerts alert-success">
                                <span>{!! \Session::get('success') !!}</span>
                            </div>
                        @elseif (\Session::has('error'))
                            <div class="alerts alert-danger">
                                <span>{!! \Session::get('error') !!}</span>
                            </div>
                        @endif
                    </div>
                    <h1 class="sign-title">Cadastar Anúncio</h1>
                    <form method="POST" action="{{route('cadastro-loja-produto')}}" class="form-signin">
                        @csrf
                        <div class="login-wrap">
                            <div class="form-group">
                                <label>Produto</label>
                                <select name="id_produto" id="id_produto" class="form-control">
                                    <option value="" selected disabled hidden>Escolha a opção</option>
                                    @foreach($produtos as $p)
                                        <option value="{{$p->id}}">{{$p->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="float" name="valor" value="" id="valor" class="form-control" placeholder="Digite o valor">
                            </div>

                            <button class="btn btn-lg btn-login btn-block" type="submit">
                                <h4>Cadastrar</h4>
                            </button>
                        </div>
                    </form>
	            </div>
            </article>
        </div>
    </section>

@endsection
