<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/hello', function () {
    return "<h1>Olá Mundo</h1>";
})->name('hello');

Route::get('/home', [UtilController::class, 'home']);

Route::get('/welcome/{name}', function ($name) {
    return "<h1>Bem Vindo $name</h1>";
});

//rotas de users

//rota que mostra o form para inserir users (GET)
Route::get('/add-users', [UserController::class, 'addUser'])->name('users.add');

//rota de post que pega nos dados do user e envia para o backend/servidor
Route::post('/store-user',[UserController::class, 'storeUser'])->name('users.store');

Route::get('/all-users',[UserController::class, 'listUsers'])->name('users.all');
Route::get('/user/{id}', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
Route::put('/update-users', [UserController::class, 'updateUser'])->name('users.update');


//rotas de tasks
Route::get('/add-task', [TaskController::class, 'addTask'])->name('tasks.add');

//rota de post que pega nos dados do user e envia para o backend/servidor
Route::post('/store-task',[TaskController::class, 'storeTask'])->name('tasks.store');

Route::get('/tasks', [TaskController::class, 'allTasks'])->name('tasks.all');

Route::get('/task/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');


Route::fallback( function(){
    return '<h5>Ups, essa página não existe</h5>';
});