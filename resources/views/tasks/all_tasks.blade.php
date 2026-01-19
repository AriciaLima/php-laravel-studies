@extends('layouts.fe_master')

@section('content')
    <h1>Todas as Tarefas</h1>

<<<<<<< HEAD
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
=======
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Conclusão</th>
                <th scope="col">Pessoa responsável</th>
                <th scope="col">Ações</th>
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
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
<<<<<<< HEAD
                    <td><a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
=======
                    <td class="d-flex gap-2">
                        <a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info btn-sm">Ver / Editar</a>
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger btn-sm">Apagar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Não há tarefas registadas.</td>
                </tr>
            @endforelse
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
        </tbody>
    </table>

    <a href="{{ route('home') }}">Voltar para Home</a>
@endsection
