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
Route::get('/add-users', [UserController::class, 'addUser'])->name('users.add');
Route::get('/all-users', [UserController::class, 'listUsers'])->name('users.all');

//rota de tasks
Route::get('/tasks', [TaskController::class, 'allTasks'])->name('tasks.all');

Route::fallback( function(){
    return '<h5>Ups, essa página não existe</h5>';
});
