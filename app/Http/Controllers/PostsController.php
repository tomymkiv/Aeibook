<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->get();
        
        return view(
            'home.home',
            [
                'posts' => $posts,
            ]
        );
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.all-users.publicaciones.index', ['user' => $user]);
    }
    public function create()
    {
        return view('user.all-users.publicaciones.create');
    }
    public function store(Request $request)
    {
        $path = null; // Inicializo la variable para evitar errores si no se sube un archivo
        try {
            $request->validate([
                'descripcion' => 'required|string|max:2048',
                'path' => 'mimes:mp4,png,jpg,jpeg,webp,gif|max:102400' // 100MB máx.
            ]);

            # Ubico los archivos en alguna carpeta (en caso de subir un video o imagen)
            if($request->hasFile('path')) {
                $path = $request->file('path')->store('videos', 'public');
            }
            
            Posts::create([
                'user_id' => Auth::user()->id,
                'descripcion' => $request->descripcion,
                'path' => $path // uso esa url para encontrar el archivo
            ]);

            return redirect('/home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);

        return view('user.all-users.publicaciones.edit', ['post' => $post]);
    }
    public function update($id, Request $request)
    {
        # Encuentro el post que quiero editar
        $post = Posts::findOrFail($id);

        $request->validate([
            'descripcion' => ['nullable'],
            'path' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp', 'gif'])],
        ]);

        $data = $request->only(['descripcion', 'path']);

        # filtro los datos que no son nulos y los almaceno en memoria
        $dataFiltered = array_filter($data, function ($value) {
            return !is_null($value);
        });

        if (!is_null($request->path)) {
            $imgStore = $request->path->store('publicaciones_images');
            $dataFiltered['path'] = $imgStore;
        }

        $post->update($dataFiltered);

        return redirect('/home');
    }
    public function destroy(Posts $post)
    {
        $post->delete();

        return redirect('/home');
    }
}
