@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')

<h1>Adicionar produtos</h1>


<form method="POST">
    @csrf
    <label>
        Nome:
        <input type="varchar" name="nome"/> <br>
    </label>
    <label>
        Descrição:
        <input type="varchar" name='descricao'> <br>
    </label>
    <label>
        Foto:
        <input type="varchar" name='foto'> <br>
    </label>
    <label>
        Preço:
        <input type="double" name='preco'> <br>
    </label>
    <label>
        Quantidade:
        <input type="int" name='quantidade'> <br>
    </label>
    <input type="submit" value="adicionar" />

</form>

@endsection
