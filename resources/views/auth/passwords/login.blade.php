@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')

    <h1>Login:</h1>
    <form method="post">

        @csrf

        <input type="email" name="email" placeholder="Digite um e-mail"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>

        <input type="submit" value="Entrar">

    </form>

    <a href="/register">Cadastrar</a>
     @if (session('warning'))

        {{session('warning')}}

    @endif
@endsection
