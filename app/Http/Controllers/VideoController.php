<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'description' => 'required|max:2048',
            // Acepto videos con un formato especifico y un tamaño máximo de 100MB
            'image' => ['nullable', 'file', File::types(['mp4', 'webm', 'ogg', 'mkv', 'mov', 'avi'], 'max:102400')],
        ]);

        $request->all();
    }
}
