@extends('masterPage')
@section('authContent')

<div class="containe-fluid">
    <h1>pagina de conteudo autenticado Bem Vindo {{$user->name}} {{$user->email}}</h1>
    <a class="btn btn-warning" href="{{route('logout')}}">deslogar</a>
</div>
@endsection
