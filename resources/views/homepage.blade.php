@extends('layouts.fe_master')

@section('content')


    @if ($myName)
        <h5>Bem vindo {{ $myName }}</h5>

    @else
        <h1>Caro utilizador, faça login</h1>
    @endif

    <img src="{{ asset('images/5ea9a2c7-bd2e-46b0-b858-701f9cfbd7b1.png') }}" alt="">
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello Page</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar USer</a></li>
    </ul>
@endsection
