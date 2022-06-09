<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('authent');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::prefix('/produtos')->group(function(){



    Route::get('/',[ProdutosController::class,'listaProdutos'])->name('produtos.listaProdutos');
    Route::get('/addProdutos',[ProdutosController::class,'addProdutos'])->name('produtos.addProdutos'); //adiciona novos produto a lista
    Route::post('/addProdutos',[ProdutosController::class,'addActionProdutos']); //ação de adicionar novos produto a lista
    Route::get('/editProdutos{id}',[ProdutosController::class,'editProdutos'])->name('produtos.editProdutos');
    Route::post('/editProdutos/{id}',[ProdutosController::class,'editActionProdutos'])->name('produtos.editActionProdutos');
    Route::get('delProdutos/{id}',[ProdutosController::class,'delProdutos'])->name('produtos.delProdutos');


});

Route::prefix('/cliente')->group(function(){

    Route::get('/',[ClienteController::class, 'addCliente']); //Adiociona um novo cliente
    Route::post('/addCliente',[ClienteController::class, 'addActionCliente']); // açaão de adicionar um novo cliente

});

Route::prefix('/carrinho')->group(function(){
    Route::get('/{id}',[CarrinhoController::class, 'listaCarrinho'])->name('carrinho.listaCarrinho');
    Route::post('adicionar-produto/{id}',[CarrinhoController::class, 'adicionarProduto'])->name('carrinho.adicionarProduto');
});

