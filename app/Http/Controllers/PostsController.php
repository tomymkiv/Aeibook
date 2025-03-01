<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view(
            'user.my-user.publicaciones.index',
            ['posts' => Posts::all()]
        );
    }
}
