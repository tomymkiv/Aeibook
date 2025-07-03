<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        // dd("asd");
        $user = User::where('name', 'LIKE', '%' . request('q').'%')->paginate(20);
        return view('user.all-users.buscador.index', ['users' => $user]);
    }
}
