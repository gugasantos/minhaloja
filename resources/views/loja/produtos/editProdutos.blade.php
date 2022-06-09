@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')
    <h1>Lista de Produtos</h1>
        <form method="post" action="{{route('produtos.editActionProdutos',$estoque->id_produto)}}">
            @csrf
                <table border="1" width"100%">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Foto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>ação</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nome" value="{{$estoque->nome}}"/></td>
                        <td><input type="text" name="descricao" value="{{$estoque->descricao}}"/></td>
                        <td><input type="text" name="foto" value="{{$estoque->foto}}"/></td>
                        <td><input type="text" name="preco" value="{{$estoque->preco}}"/></td>
                        <td><input type="text" name="quantidade" value="{{$estoque->quantidade}}"/></td>
                        <td><input type="submit" value="Editar"></td>
                    </tr>
                </table>
        </form>


@endsection
