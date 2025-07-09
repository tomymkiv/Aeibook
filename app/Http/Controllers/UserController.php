<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    # Vista de perfil
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.perfil.index', ['user' => $user]);
    }
    public function edit()
    {
        $user = Auth::user();
        return view('users.perfil.edit', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => ['nullable'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'confirmed', Password::min(6)->letters()->numbers()],
            'profile_photo' => ['nullable', File::types(['png', 'jpg', 'jpeg'])],
        ]);
        # Filtra los datos de la solicitud para incluir solo los campos que se desean actualizar
        $data = $request->only(['name', 'email', 'password', 'profile_photo']);

        // Elimino los campos vacíos del array
        $data = array_filter($data, function ($value) {
            # Devuelvo los valores que sean true (not null)
            return !is_null($value);
        });

        if (!is_null($request->profile_photo)) {
            $imgStore = $request->profile_photo->store('profile_images');
            $data['profile_photo'] = $imgStore;
        }
        $user->update($data);

        return redirect('/home');
    }
    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect('/');
    }
}
