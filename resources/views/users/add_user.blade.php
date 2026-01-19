@extends('layouts.fe_master')

@section('content')
<<<<<<< HEAD
    <h4>Olá, aqui podes adicionar utilizadores</h4>
    <ul>
        @foreach ($users as $user)
        @endforeach

        <form method="POST" action = "{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label">Nome</label>
                <input required name="name" class="form-control" id="inputName" aria-describedby="nameHelp">
            </div>
            @error('name')
                <p class='text-danger'>Erro de nome</p>
            @enderror

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input required name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div name="email" id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            @error('email')
                <p class='text-danger'>Erro de email</p>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            @error('password')
                <p class='text-danger'>Erro de password</p>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
=======
    <div class="max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">
            <i class="fas fa-user-plus text-indigo-600 mr-2"></i>Adicionar Novo Utilizador
        </h2>

        <form method="POST" action="{{ route('users.store') }}" class="bg-white rounded-lg shadow-md p-8">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                <input
                    required
                    name="name"
                    type="text"
                    id="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ex: João Silva"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input
                    name="email"
                    required
                    type="email"
                    id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="exemplo@email.com"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Palavra-passe</label>
                <input
                    required
                    name="password"
                    type="password"
                    id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Mínimo 8 caracteres"
                >
                @error('password')
                    <p class="text-red-600 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-save mr-2"></i>Guardar
                </button>
                <a href="{{ route('users.all') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition font-medium">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
