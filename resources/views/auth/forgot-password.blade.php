@extends('layouts.fe_master')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
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
        <button type="submit"
            class="w-full bg-indigo-600 text-white font-medium py-2 rounded-lg hover:bg-indigo-700 transition">
            <i class="fas fa-sign-in-alt mr-2"></i>Recuperar Palavra-passe
        </button>
    </form>
@endsection
