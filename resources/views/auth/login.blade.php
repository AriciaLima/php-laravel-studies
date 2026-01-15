@extends('layouts.fe_master')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-center text-3xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-sign-in-alt text-indigo-600 mr-2"></i>Login
                </h2>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="seu.email@exemplo.com">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Palavra-passe</label>
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium py-2 rounded-lg hover:bg-indigo-700 transition">
                        <i class="fas fa-sign-in-alt mr-2"></i>Entrar
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Novo utilizador?
                        <a href="{{ route('users.add') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                            Criar conta aqui
                        </a>
                    </p>
        
                    <p>Esqueceu a palavra-passe? <a href="{{ route('password.request') }}"
                            class="text-indigo-600 hover:text-indigo-700 font-medium">Recuperar aqui</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
