<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        # Valido
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:256'],
            'password' => ['required', 'confirmed', RulesPassword::min(6)->letters()->numbers()],
            'profile_photo' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        # Almaceno la imagen en storage/public/profile_images
        # Para esto, cambié el archivo .env:
        # FILESYSTEM_DISK=local => FILESYSTEM_DISK=public
        // dd($request->profile_photo);
        if (!is_null($request->profile_photo)) {
            $imgStore = $request->profile_photo->store('profile_images');
        } else {
            # Si no selecciono una imagen, asigno una aleatoria
            $imgStore = 'http://picsum.photos/seed/' . rand(0, 100000) . '/250/250';
        }

        // } else {
        //     $imgStore = 'storage/app/public/profile_images/resources/images/image-not-found.png';
        // }
        // $imgPath = $request;

        # Creo el usuario
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'profile_photo' => $imgStore,
        ]);
        # Inicio sesión y redirijo
        Auth::login($user);
        return redirect('home');
    }
    public function fakeUser()
    {
        $user = User::factory()->create();
        Auth::login($user);
        return redirect('home');
    }
}
