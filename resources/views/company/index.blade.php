@extends('layouts.fe_master')

@section('content')
    <h1>Informações da Empresa</h1>
    
    <div class="company-info">
        <ul>
            <li><strong>Nome:</strong> {{ $cesaeInfo['name'] }}</li>
            <li><strong>Morada:</strong> {{ $cesaeInfo['address'] }}</li>
            <li><strong>Email:</strong> {{ $cesaeInfo['email'] }}</li>
        </ul>
    </div>

    <br>
    <a href="{{ route('home') }}">Voltar para Home</a>
@endsection
