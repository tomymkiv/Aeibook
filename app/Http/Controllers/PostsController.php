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
        # Ordeno por fecha de creación, de forma descendente (desc).
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
        $imgStore = null; # Imagen nula en caso de no elegir ningun archivo

        $request->validate([
            'descripcion' => ['required', 'max:2048'],
            'image' => ['nullable', File::types(['png', 'jpeg', 'jpg', 'webp', 'gif'])],
        ]);

        # Si tengo una imagen, le creo la url para almacenarla en esta carpeta
        if (!is_null($request->image)) {
            $imgStore = $request->image->store('publicaciones_images');
        }

        Posts::create([
            'user_id' => Auth::user()->id,
            'descripcion' => request('descripcion'),
            'image' => $imgStore,
        ]);

        return redirect('/home');
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
            'image' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp', 'gif'])],
        ]);

        $data = $request->only(['descripcion', 'image']);

        # filtro los datos que no son nulos y los almaceno en memoria
        $dataFiltered = array_filter($data, function ($value) {
            return !is_null($value);
        });

        if (!is_null($request->image)) {
            $imgStore = $request->image->store('publicaciones_images');
            $dataFiltered['image'] = $imgStore;
        }

        $post->update($dataFiltered);

        return redirect('/home');
    }
    public function destroy(Posts $post)
    {
        // $post = Posts::find($id);
        $post->delete();

        return redirect('/home');
    }
}
