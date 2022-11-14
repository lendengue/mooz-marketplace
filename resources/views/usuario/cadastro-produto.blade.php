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
                    <h1 class="sign-title">Cadastar Produto</h1>
                    <form method="POST" action="{{route('cadastro-produto')}}" class="form-signin" enctype="multipart/form-data">
                        @csrf
                        <div class="login-wrap">
                            <div class="form-group">
                                <label>Produto</label>
                                <input type="text" name="nome" value="" id="nome" class="form-control" placeholder="Digite o nome do produto">
                            </div>
                            <div class="form-group">
                                <label>Imagem</label>
                                <input type="file" name="img" id="img" value="">
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
