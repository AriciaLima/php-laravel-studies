@extends('layouts.fe_master')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('users.all') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition border-l-4 border-indigo-600">
                <div class="flex items-center gap-4">
                    <div class="bg-indigo-100 rounded-lg p-4 text-indigo-600 text-2xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Utilizadores</h3>
                        <p class="text-gray-600 text-sm">Ver, editar e criar utilizadores</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('tasks.all') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition border-l-4 border-green-600">
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 rounded-lg p-4 text-green-600 text-2xl">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Tarefas</h3>
                        <p class="text-gray-600 text-sm">Acompanhe e gere tarefas</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('users.add') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition border-l-4 border-blue-600">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 rounded-lg p-4 text-blue-600 text-2xl">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">Adicionar Utilizador</h3>
                        <p class="text-gray-600 text-sm">Criar uma nova conta</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection