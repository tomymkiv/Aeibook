<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index'); # Bienvenida
Route::get('/home', [PostsController::class, 'index']); # Menu

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store']);
    Route::post('/fakeUser', [RegisterUserController::class, 'fakeUser']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/user/{id}/perfil', [UserController::class, 'show']); # buscar perfiles
Route::get('/user/{id}/muro', [PostsController::class, 'show']); # mirar publicaciones de un usuario
# Buscador de usuarios
Route::get('/search', SearchController::class);

Route::middleware('auth')->group(function () {
    Route::view('/user/settings', 'user.settings');
    Route::delete('/logout', [LoginController::class, 'destroy']);
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::patch('/user/edit', [UserController::class, 'update']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
    # publicaciones de los usuarios
    Route::get('/user/muro/create', [PostsController::class, 'create']);
    Route::post('/user/muro/create', [PostsController::class, 'store']);
    Route::get('/user/muro/{id}/edit', [PostsController::class, 'edit']);
    Route::patch('/user/muro/{id}/edit', [PostsController::class, 'update']);
    # Eliminar una publicacion
    Route::delete('/user/muro/{post}', [PostsController::class, 'destroy']);
});
