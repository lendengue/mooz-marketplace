@extends('template.login-layout')

@section('conteudo')
    <div class="container">
        <form method="POST" action="{{route('cadastro')}}" class="form-signin">
			<div class="form-signin-heading text-center">
                <img src="{{asset('assets/images/mooz-logo.png')}}" alt="Logotipo"/>
				<h1 class="sign-title">Cadastro</h1>
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
			<div class="login-wrap">
				@csrf
				<label>Nome</label><input type="text" name="nome" value="" id="nome" class="form-control" placeholder="Digite seu nome" autofocus="autofocus">
				<label>Email</label><input type="text" name="email" value="" id="email" class="form-control" placeholder="Digite seu email" >
				<label>Senha</label><input type="password" name="senha" value="" id="senha" class="form-control" placeholder="Digite sua senha">
				<label>Loja</label><input type="text" name="loja" value="" id="loja" class="form-control" placeholder="Digite o nome da sua loja">

				<button class="btn btn-lg btn-login btn-block" type="submit">
					<h4>Cadastrar</h4>
				</button>
				
			</div>
		</form>
	</div>
@endsection