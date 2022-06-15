<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use Illuminate\Http\Request;
use App\Models\Produto;
use Egulias\EmailValidator\Warning\Warning;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listaProdutos(){
        $produto = Produto::all();
        $nomedologin = Auth::user();


        return view('loja.produtos.listaProdutos',[
            'listaProdutos' => $produto,
            'nomedologin' => $nomedologin,
            'seeAdmin' => Gate::allows('see-admin')
        ]);
    }
    public function addProdutos(){
        return view('loja.produtos.addProdutos');

    }
    public function addActionProdutos(Request $request){
        if($request->filled('nome') && $request->filled('descricao') && $request->filled('foto') &&
        $request->filled('preco') && $request->filled('quantidade')){

            $nome = $request->input('nome');
            $descricao = $request->input('descricao');
            $foto = $request->input('foto');
            $preco = $request->input('preco');
            $quantidade = $request->input('quantidade');

            $p = new Produto;
            $p->nome = $nome;
            $p->descricao = $descricao;
            $p->foto = $foto;
            $p->preco = $preco;
            $p->quantidade = $quantidade;
            $p->save();

            return redirect()->route('produtos.listaProdutos');
        }else{
            return redirect()
            ->route('produtos.addProdutos')
            ->with('warning', 'Você não preencheu o titulo.');
        }
    }
    public function editProdutos($id){
        $estoque =  Produto::find($id);
        return view('loja.produtos.editProdutos',[
            'estoque' => $estoque,
            'id' => $id
        ]);
    }
    public function editActionProdutos(Request $request,$id){
        if($request->filled('nome') && $request->filled('descricao') && $request->filled('foto') &&
        $request->filled('preco') && $request->filled('quantidade')){
            $nome = $request->input('nome');
            $descricao = $request->input('descricao');
            $foto = $request->input('foto');
            $preco = $request->input('preco');
            $quantidade = $request->input('quantidade');

            $p = Produto::find($id);
            $p->nome = $nome;
            $p->descricao = $descricao;
            $p->foto = $foto;
            $p->preco = $preco;
            $p->quantidade = $quantidade;
            $p->save();

        }
        else{
            return redirect()->route('prudutos.editProdutos');
        }
        return redirect()->route('produtos.listaProdutos');
    }

    public function delProdutos($id){
        /*$teste = ItemPedido::where('id_produto',$id)->get;
        if($teste){
            return redirect()->route('produtos.listaProdutos')
                ->with('warning', 'O produto não pode ser apagado pois esta sendo comercializado.');
        }else{
            Produto::find($id)->delete();
            return redirect()->route('produtos.listaProdutos');
        }
        */

        /*
        try{

            if(ItemPedido::where('id_produto',$id)){
                Produto::find($id)->delete();
                redirect()->route('produtos.listaProdutos');
            }else{
                throw new \Exception();
            }
        }catch(\Exception){
            echo "<pre>";
            return redirect()->route('produtos.listaProdutos')
                ->with('warning', 'Produto não pode ser excluído pois está sendo comercializado');
            echo "</pre>"; exit;
        }
        return redirect()->route('produtos.listaProdutos');
        */
        try{

            if(ItemPedido::where('id_produto',$id)){
                Produto::find($id)->delete();
                return redirect()->route('produtos.listaProdutos');
            }else{
                throw new Exception();
            }
        }catch(\Exception $e){
            $mensagem = ['Produto não pode ser excluído pois está sendo comercializado','Mensagem original: '.$e->getMessage(),'Código: '.$e->getCode(),'Linha: '.$e->getLine(),'Arquivo: '.$e->getFile() ];
            return redirect()->route('produtos.listaProdutos')
                ->with('warning',$mensagem );


        }



    }
}
