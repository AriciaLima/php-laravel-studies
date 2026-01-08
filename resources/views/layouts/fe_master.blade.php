<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor de Tarefas e Utilizadores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 flex items-center gap-2">
                        <i class="fas fa-tasks"></i> TaskHub
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition font-medium">
                            <i class="fas fa-home"></i> Home
                        </a>
                        <a href="{{ route('users.all') }}" class="text-gray-600 hover:text-indigo-600 transition font-medium">
                            <i class="fas fa-users"></i> Utilizadores
                        </a>
                        <a href="{{ route('tasks.all') }}" class="text-gray-600 hover:text-indigo-600 transition font-medium">
                            <i class="fas fa-list-check"></i> Tarefas
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex space-x-4 items-center">
                    @auth
                        <span class="text-gray-700 font-medium mr-4">
                            <i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->name }}
                        </span>
                        <a href="{{ route('users.add') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm flex items-center gap-2">
                            <i class="fas fa-plus"></i> Novo Utilizador
                        </a>
                        <a href="{{ route('tasks.add') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-medium text-sm flex items-center gap-2">
                            <i class="fas fa-plus"></i> Nova Tarefa
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition font-medium text-sm flex items-center gap-2">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </a>
                        <a href="{{ route('users.add') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition font-medium text-sm">
                            <i class="fas fa-user-plus mr-2"></i>Criar Conta
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-100 mt-16 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-sm">&copy; 2026 TaskHub. Todos os direitos reservados. <span class="text-indigo-400">v1.0</span></p>
            </div>
        </div>
    </footer>
</body>

</html>
 
 