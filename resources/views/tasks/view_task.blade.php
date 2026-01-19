@extends('layouts.fe_master')

@section('content')
    <h3>Detalhes da Tarefa</h3>

    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{ $task->name }}</td>
            </tr>
            <tr>
                <th>Estado</th>
                <td>
                    @if (is_null($task->status))
                        Por definir
                    @elseif($task->status)
                        Concluída
                    @else
                        Em progresso
                    @endif
                </td>
            </tr>
            <tr>
                <th>Conclusão</th>
                <td>{{ $task->due_at ?? 'Sem data' }}</td>
            </tr>
            <tr>
                <th>Responsável</th>
                <td>{{ $task->user_name ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('tasks.all') }}" class="btn btn-secondary">Voltar</a>
@endsection
