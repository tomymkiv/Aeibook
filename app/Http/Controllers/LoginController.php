<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $att = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        # Esto es para que no se refresque la página (aunque las credenciales sean incorrectas)
        if(!Auth::attempt($att)){
            throw ValidationValidationException::withMessages([
                'email' => 'Credenciales incorrectas',
            ]);
        }

        $request->session()->regenerate();
        return redirect('home');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
