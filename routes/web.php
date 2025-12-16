<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;

Route::get('/estudantes', [EstudanteController::class, 'index'])->name('estudantes.index');


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

Route::get('/add-users', [UserController::class, 'addUser'])->name('users.add');


Route::fallback( function(){
    return '<h5>Ups, essa página não existe</h5>';
});
