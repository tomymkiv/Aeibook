<?php

use App\Http\Controllers\PostsController;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index'); # Bienvenida

Route::get('/home', function (){
    return view('home.home', [
        'posts' => Posts::all(),
    ]);
}); 
# Menu
Route::view('/register', 'auth.register'); 
Route::view('/login', 'auth.login');
# mi usuario
Route::view('/user/perfil', 'user.my-user.profile.index');
Route::view('/user/edit', 'user.my-user.profile.edit');
Route::view('/user/muro/edit', 'user.my-user.publicaciones.edit');
Route::view('/user/muro', 'user.my-user.publicaciones.index');
Route::get('/user/muro', [PostsController::class, 'index']);
// Route::get('/user/muro', [PostsController::class, 'index']);
Route::view('/user/muro/create', 'user.my-user.publicaciones.create');
# otros usuarios
Route::view('/user/2/perfil', 'user.users.profile.index');
Route::view('/user/2/muro', 'user.users.publicaciones.index');