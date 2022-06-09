<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\ItemPedido;

class CarrinhoController extends Controller
{
    public function listaCarrinho($id){
        $data = Produto::find($id);
        if($data){
            return view('loja.carrinho.listaCarrinho',[
                'data' => $data,
                'id' => $id
            ]);
        }else{
            return redirect()->route('produtos.listaProdutos');
        }
    }

    public function adicionarProduto(Request $request, $id){
        $quantidade = $request->input('quantidade');
        $data = Produto::find($id);
        if($data){
            $p = new ItemPedido;
            $p->valor_produto = $data->preco;
            $p->quantidade = $quantidade;
            $p->id_produto = $id;
            $p->save();

            $p = Produto::find($id);
            $p->quantidade = ($data->quantidade - $quantidade);
            $p->id_produto = $id;
            $p->save();

        }else{
            return redirect()->route('carrinho.listaCarrinho');
        }
        return redirect()->route('produtos.listaProdutos');

    }
}
