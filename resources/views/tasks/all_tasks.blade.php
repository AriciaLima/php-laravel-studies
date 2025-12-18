@extends('layouts.fe_master')

@section('content')
    <h1>Todas as Tarefas</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Conclusão</th>
                <th scope="col">Pessoa responsável</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>
                        @if (is_null($task->status))
                            Por definir
                        @elseif($task->status)
                            Concluída
                        @else
                            Em progresso
                        @endif
                    </td>
                    <td>{{ $task->due_at ?? 'Sem data' }}</td>
                    <td>{{ $task->user_name ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Não há tarefas registadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('home') }}">Voltar para Home</a>
@endsection
