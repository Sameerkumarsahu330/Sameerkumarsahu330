<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('todo.index');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todo.store');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todo.show');
