<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LojaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function(){
    Route::post('/login','login')->name('login');
    Route::post('/logout','logout')->name('logout');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    
    
    Route::get('/login','login')->name('login-view');
    Route::get('/cadastro','cadastro')->name('cadastro-view');
    Route::post('/cadastro','postCadastro')->name('cadastro');


    Route::get('/produto/{id_produto}/{id_loja?}','produto')->name('produto');
    Route::get('/loja/{id_loja}','loja')->name('loja');
});

Route::controller(LojaController::class)->prefix('usuario')->group(function(){
    Route::get('/minha-loja','loja')->name('usuario-loja');
    Route::get('/minha-loja/cadastrar','lojaProduto')->name('usuario-loja-produto');
    Route::post('/minha-loja/cadastrar','cadastroLojaProduto')->name('cadastro-loja-produto');

    Route::get('/minha-loja/cadastrar/produto','produto')->name('usuario-produto');
    Route::post('/minha-loja/cadastrar/produto','cadastroProduto')->name('cadastro-produto');
    
});
