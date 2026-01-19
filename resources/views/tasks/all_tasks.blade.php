@extends('layouts.fe_master')

@section('content')
    <h1>Todas as Tarefas</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.add') }}" class="btn btn-primary mb-3">
        Adicionar Tarefa
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Estado</th>
                <th>Conclusão</th>
                <th>Pessoa responsável</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th>{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ is_null($task->status) ? 'Por definir' : ($task->status ? 'Concluída' : 'Em progresso') }}</td>
                    <td>{{ $task->due_at ?? 'Sem data' }}</td>
                    <td>{{ $task->user_name ?? 'N/A' }}</td>
                    <td><a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}">Voltar para Home</a>
@endsection
