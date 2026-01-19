<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rotas gerais e páginas simples
|--------------------------------------------------------------------------
| Rotas que não pertencem a nenhum domínio específico
| Servem para testes, páginas iniciais ou exemplos
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/hello', function () {
    return '<h1>Olá Mundo</h1>';
})->name('hello');

Route::get('/welcome/{name}', function ($name) {
    return "<h1>Bem Vindo $name</h1>";
});

<<<<<<< HEAD
//rotas de users
Route::get('/all-users', [UserController::class, 'listUsers'])->name('users.all');
Route::get('user/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

//rota que mostra o form para inserir users(GET)
Route::get('/add-users', [UserController::class, 'addUser'])->name('users.add');
//rota 
Route::post('/store-users', [UserController::class, 'storeUser'])->name('users.store');

//rota de tasks
Route::get('/tasks', [TaskController::class, 'allTasks'])->name('tasks.all');
Route::get('/tasks/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('delete-task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

// rota que mostra o form para inserir tasks (GET)
Route::get('/add-tasks', [TaskController::class, 'addTask'])->name('tasks.add');

// rota que guarda a task (POST)
Route::post('/store-tasks', [TaskController::class, 'storeTask'])->name('tasks.store');

=======
/*
|--------------------------------------------------------------------------
| Home da aplicação
|--------------------------------------------------------------------------
| Página principal do site
*/

Route::get('/home', [UtilController::class, 'home'])->name('home');
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

/*
|--------------------------------------------------------------------------
| Rotas de Users
|--------------------------------------------------------------------------
| Todas as ações relacionadas com utilizadores
*/

# Mostra o formulário para criar um novo user
Route::get('/add-users', [UserController::class, 'addUser'])
    ->name('users.add');

# Recebe os dados do formulário e guarda o user
Route::post('/store-user', [UserController::class, 'storeUser'])
    ->name('users.store');

# Lista todos os users
Route::get('/all-users', [UserController::class, 'listUsers'])
    ->name('users.all');

# Mostra os dados de um user específico
Route::get('/user/{id}', [UserController::class, 'viewUser'])
    ->name('users.view');

# Atualiza os dados de um user existente
Route::put('/update-users', [UserController::class, 'updateUser'])
    ->name('users.update');

# Apaga um user
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])
    ->name('users.delete');

/*
|--------------------------------------------------------------------------
| Rotas de Tasks
|--------------------------------------------------------------------------
| Todas as ações relacionadas com tarefas
*/

# Mostra o formulário para criar uma task
Route::get('/add-task', [TaskController::class, 'addTask'])
    ->name('tasks.add');

# Recebe os dados do formulário e guarda a task
Route::post('/store-task', [TaskController::class, 'storeTask'])
    ->name('tasks.store');

# Lista todas as tasks
Route::get('/tasks', [TaskController::class, 'allTasks'])
    ->name('tasks.all');

# Mostra uma task específica
Route::get('/task/{id}', [TaskController::class, 'viewTask'])
    ->name('tasks.view');

# Atualiza os dados de uma task
Route::put('/task/{id}', [TaskController::class, 'updateTask'])
    ->name('tasks.update');

# Apaga uma task
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])
    ->name('tasks.delete');

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação
|--------------------------------------------------------------------------
| Login, Logout e Registo
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit')
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

    /*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
| Executado quando nenhuma rota é encontrada
*/

Route::fallback(function () {
    return '<h5>Ups, essa página não existe</h5>';
});
