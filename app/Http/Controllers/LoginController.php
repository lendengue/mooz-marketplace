<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller{

    public function login(Request $request){
        
        $email = $request['email'];
        $senha = $request['senha'];

        $user = Usuario::select('email','senha')
            ->where('email',$email)
            ->where('senha',$senha)
            ->first();

        if(!$user){
            return redirect()->back()->with(['error' => 'Email ou senha incorreto!']);
        }

        if(Auth::attempt(['email' => $user->email, 'senha' => $user->senha])){
            return redirect()->intended('usuario/minha-loja');
        }

        return redirect()->back()->with(['error' => 'Não foi possível efetuar o login. Tente novamente.']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login-view');
    }
}
