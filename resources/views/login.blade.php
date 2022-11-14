@extends('template.login-layout')

@section('conteudo')
    <div class="container">
        <form method="POST" action="{{route('login')}}" class="form-signin">
			<div class="form-signin-heading text-center">
                <img src="{{asset('assets/images/mooz-logo.png')}}" alt="Logotipo"/>
				<h1 class="sign-title">Login</h1>
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
				<input type="text" name="email" value="" id="email" class="form-control" placeholder="Digite seu email" autofocus="autofocus">
				<input type="password" name="senha" value="" id="senha" class="form-control" placeholder="Digite sua senha">

				<button class="btn btn-lg btn-login btn-block" type="submit">
					<h4>Entrar</h4>
				</button>
				<label class="checkbox">
					<span class="text-left">
						<i class="fa fa-check"></i>
						<a href="{{route('cadastro-view')}}">Cadastre-se</a>
					</span>
				</label>
			</div>
		</form>
	</div>
@endsection