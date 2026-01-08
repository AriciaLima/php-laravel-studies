@extends('layouts.fe_master')

@section('content')
    <h1>Ver / Editar Tarefa</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input value="{{ old('name', $task->name) }}" required name="name" type="text" class="form-control" id="name">
        </div>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $task->description) }}</textarea>
        </div>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-select">
                <option value="" {{ old('status', $task->status) === null ? 'selected' : '' }}>Por definir</option>
                <option value="1" {{ old('status', $task->status) === 1 ? 'selected' : '' }}>Concluída</option>
                <option value="0" {{ old('status', $task->status) === 0 ? 'selected' : '' }}>Em progresso</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="due_at" class="form-label">Conclusão</label>
            <input value="{{ old('due_at', $task->due_at) }}" name="due_at" type="date" class="form-control" id="due_at">
        </div>
        @error('due_at')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="d-flex gap-2">
            <a class="btn btn-secondary" href="{{ route('tasks.all') }}">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endsection