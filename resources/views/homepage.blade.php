@extends('layouts.fe_master')

@section('content')

    {{-- Mensagem de boas vindas --}}
    @auth
    <h5>Olá, {{ Auth::user()->name }}</h5>
    @endauth

    {{-- Dados do utilizador --}}
    @isset($userData)
        <p>{{ $userData['name'] }} - {{ $userData['age'] }}</p>
    @endisset

    {{-- Informação institucional --}}
    @isset($cesaeInfo)
        <p>
            {{ $cesaeInfo['name'] }}
            {{ $cesaeInfo['email'] }}
            {{ $cesaeInfo['address'] }}
        </p>
    @endisset

    {{-- Imagem --}}
    <img
        src="{{ asset('images/5ea9a2c7-bd2e-46b0-b858-701f9cfbd7b1.png') }}"
        alt="Imagem ilustrativa"
        style="max-width: 300px"
    >

    {{-- Navegação principal --}}
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello Page</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar User</a></li>
        <li><a href="{{ route('users.all') }}">Todos os Users</a></li>
        <li><a href="{{ route('tasks.add') }}">Adicionar Tarefa</a></li>
         <li><a href="{{ route('tasks.all') }}">Todas as Tarefas</a></li>
        <li><a href="{{ route('dashboard') }}">Todas as Tarefas</a></li>
    </ul>


@endsection
