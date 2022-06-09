@extends('layouts.admin')

@section('title', 'Loja do Gustavo')

@section('content')

    <h1>Cadastro:</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form method="post">

        @csrf

        <input type="nome" name="name" placeholder="Digite seu nome" value="{{old('name')}}"><br>
        <input type="email" name="email" placeholder="Digite um e-mail" value="{{old('email')}}"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>
        <input type="password" name="password_confirmation" placeholder="Confirme sua senha"><br>

        <input type="submit" value="Cadastrar">

    </form>
    @if (session('warning'))

    {{session('warning')}}

@endif
@endsection
