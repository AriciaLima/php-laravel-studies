@extends('layouts.fe_master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold text-center mb-6">
            Redefinir palavra-passe
        </h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Endereço de email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ request()->email }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('email') border-red-500 @else border-gray-300 @enderror"
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Nova palavra-passe
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('password') border-red-500 @else border-gray-300 @enderror"
                >
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirmar nova palavra-passe
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white font-medium py-2 rounded-lg
                       hover:bg-indigo-700 transition"
            >
                Redefinir palavra-passe
            </button>
        </form>
    </div>
</div>
@endsection
