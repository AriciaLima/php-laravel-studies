@extends('layouts.fe_master')

@section('content')
    <h1>Lista de Estudantes</h1>
    
    <div class="estudantes-list">
        @if(count($estudantes) > 0)
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estudantes as $estudante)
                        <tr>
                            <td>{{ $estudante['nome'] }}</td>
                            <td>{{ $estudante['idade'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Não há estudantes cadastrados.</p>
        @endif
    </div>

    <br>
    <a href="{{ route('welcome') }}">Voltar para Home</a>
@endsection
