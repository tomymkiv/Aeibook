<?php

namespace App\Http\View\Composers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with('user', Auth::user());
        $view->with('users', User::all());
        $view->with('posts', Posts::all());
    }
}