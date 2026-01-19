<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;




Route::get('/', [UtilController::class, 'home'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/hello', function () {
    return "<h1>Olá Mundo</h1>";
})->name('hello');

Route::get('/welcome/{name}', function ($name) {
    return "<h1>Bem Vindo $name</h1>";
});

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


Route::fallback( function(){
    return '<h5>Ups, essa página não existe</h5>';
});
