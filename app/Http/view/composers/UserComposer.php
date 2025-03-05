<?php

namespace App\Http\View\Composers;

use App\Models\Posts;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with('user', Auth::user());
        $view->with('posts', Posts::all());
    }
}