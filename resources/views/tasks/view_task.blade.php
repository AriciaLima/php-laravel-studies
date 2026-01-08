@extends('layouts.fe_master')

@section('content')
    <h1>Detalhes da Tarefa</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <dl class="row">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9">{{ $task->id }}</dd>

        <dt class="col-sm-3">Nome</dt>
        <dd class="col-sm-9">{{ $task->name }}</dd>

        <dt class="col-sm-3">Descrição</dt>
        <dd class="col-sm-9">{{ $task->description ?? '—' }}</dd>

        <dt class="col-sm-3">Estado</dt>
        <dd class="col-sm-9">
            @if (is_null($task->status))
                Por definir
            @elseif($task->status)
                Concluída
            @else
                Em progresso
            @endif
        </dd>

        <dt class="col-sm-3">Conclusão</dt>
        <dd class="col-sm-9">{{ $task->due_at ?? 'Sem data' }}</dd>

        <dt class="col-sm-3">Responsável</dt>
        <dd class="col-sm-9">{{ $task->user_name ?? 'N/A' }}</dd>
    </dl>

    <div class="d-flex gap-2">
        <a class="btn btn-secondary" href="{{ route('tasks.all') }}">Voltar</a>
        <a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">Editar</a>
    </div>
@endsection