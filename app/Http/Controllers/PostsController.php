<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class PostsController extends Controller
{
    // Limite de carga de posts
    protected int $limit = 15;

    public function data(Request $request)
    {
        $offset = $request->input('offset', 0); // Obtiene el offset del request, por defecto es 0
        $posts = Posts::with('user')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($this->limit)
            ->get();
        $loguedUser = Auth::user();
        # Obtengo los posts + el usuario relacionado a cada post
        # Los limito a una cantidad especifica usando el offset + take(cantidad)
        if ($loguedUser) {
            return response()->json([
                'posts' => $posts,
                'loguedUser' => $loguedUser
            ]);
        }

        // Lo dejo como array asi el comportamiento de JS no varía
        return response()->json(['posts' => $posts]);
    }
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')
            ->take($this->limit)
            ->get();

        return view(
            'home.home',
            [
                'posts' => $posts,
            ]
        );
    }
    // Publicaciones del usuario limitado a la cantidad indicada en $this->limit
    public function dataUser($id, Request $request)
    {
        $loguedUser = Auth::user();
        $offset = $request->input('offset', 0); // Obtiene el offset del request, por defecto es 0
        // Obtengo los posts solo del usuario con el ID especificado
        $posts = Posts::where('user_id', $id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($this->limit)
            ->get();        
        return response()->json([
            'posts' => $posts,
            'loguedUser' => $loguedUser,
        ]);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Posts::orderBy('created_at','desc')
        ->take($this->limit)
        ->get();
        return view('users.publicaciones.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    public function create()
    {
        return view('users.publicaciones.create');
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
            if ($request->hasFile('path')) {
                $path = $request->file('path')->store('files', 'public');
            }

            Posts::create([
                'user_id' => Auth::user()->id,
                'descripcion' => $request->descripcion,
                'path' => $path, // uso esa url para encontrar el archivo
            ]);

            return redirect('/home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);

        return view('users.publicaciones.edit', ['post' => $post]);
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
