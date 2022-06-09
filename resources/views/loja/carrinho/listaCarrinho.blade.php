@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')

<h1>Carrinho</h1>

<form method="post" action="{{route('carrinho.adicionarProduto',$id)}}">
    @csrf
    <label >
        <table border="2"'>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ação</th>

            </tr>
            <tr>
                <td>{{$data->nome}}</td>
                <td ><input type="number" name="quantidade" value='1'></td>
                <td>{{$data->preco}}</td>
                <td><input type="submit" value="Comprar" onclick="return confirm('Tem certeza que deseja comprar esse produto?')"></td>
            </tr>
        </table>
    </label>


</form>

@endsection
