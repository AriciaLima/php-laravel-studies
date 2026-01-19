@extends('layouts.fe_master')
<<<<<<< HEAD

@section('content')
    <h2>Adicionar Tarefa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
=======
@section('content')
    <h4>Olá, aqui podes adicionar tarefas</h4>
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
<<<<<<< HEAD
            <label for="taskName" class="form-label">Tarefa</label>
            <input required maxlength="50" type="text" name="name" id="taskName" class="form-control"
                value="{{ old('name') }}">
        </div>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Descrição</label>
            <textarea name="description" id="taskDescription" rows="4" class="form-control">{{ old('description') }}</textarea>
        </div>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="taskUser" class="form-label">Responsável</label>
            <select required name="user_id" id="taskUser" class="form-select">
                <option value="" selected disabled>Selecione um utilizador</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>
        @error('user_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tasks.all') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
=======
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger"> Erro de nome</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input required name="description" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('description')
            <p class="text-danger"> Erro de descrição</p>
        @enderror

        <select name="user_id" id="">
            <option value="">Escolha User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id}}">{{ $user->name}}</option>
            @endforeach

        </select> <br>
        <br>
        @error('password')
            <p class="text-danger"> Erro de user</p>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
