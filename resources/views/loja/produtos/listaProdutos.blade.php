@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')

    Olá, {{$nomedologin->name}} - <a href="/logout">Sair</a><br><br>
    @if (session('warning'))

    @foreach(session('warning') as $item)
        <li><b>{{$item}}</b><br/><br/></li>
    @endforeach

    @endif
    <h1>Lista de Produtos</h1>

        @if(count($listaProdutos)>0)
            <table border="2">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Foto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    @if($seeAdmin)
                        <th colspan="3">ação</th>
                    @endif
                </tr>
                @foreach($listaProdutos as $item)
                <tr>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>{{$item->foto}}</td>
                    <td>{{$item->preco}}</td>
                    <td>{{$item->quantidade}}</td>
                    <td><a href="/carrinho/{{$item->id_produto}}">Adicionar ao carrinho</a></td>
                    @if($seeAdmin)
                        <td><a href="{{route('produtos.editProdutos',['id'=>$item->id_produto])}}">Editar</a></td>
                        <td><a href="{{route('produtos.delProdutos',['id'=>$item->id_produto])}}" onclick="return confirm('Tem certeza que deseja excluir esse produto?')">Excluir</a></td>
                    @endif
                </tr>


                @endforeach
            </table>
        @else
            Não há produtos a serems listados.
        @endif
        @if($seeAdmin)
            <a href="{{url('produtos/addProdutos')}}">Adicionar novo Produto<br><br></a>
        @endif

@endsection
