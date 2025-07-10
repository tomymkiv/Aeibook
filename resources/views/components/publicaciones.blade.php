@php
    # Convierto el userId a entero para poder compararlos correctamente
    $idUser = trim($userId->toHtml());
    // dd($file);
    # lo convierto a html para tomar el contenido correctamente
    $postFileContent = trim($file->toHtml());
    $IdPostSeleccionado = $postId;
@endphp

<article class="w-full w-full max-w-sm sm:max-w-lg text-black/75 mx-3 mt-24 space-y-14">
    <div class="p-5 w-auto bg-white/90 rounded-lg">
        <div class="space-y-12">
            <div class="flex flex-row items-center gap-3">
                <span
                    class="w-20 h-20 flex items-center justify-center border-white/30 rounded-full aspect-square object-cover">
                    <x-rounded-img src="{{ asset($profilePhoto) }}" />
                </span>
                <h5 class="text-lg w-full font-semibold">{{ $username }}
                    @auth
                        @if (Auth::user()->id === $userId)
                            (tú)
                        @endif
                    @endauth
                </h5>
                <div class="relative flex justify-end">
                    <div class="info-button w-fit flex justify-end">
                        <button type="button"
                            class="cursor-pointer hover:bg-black/20 transition-background duration-300 rounded-full inline-flex justify-center gap-x-1.5 px-3 py-2 text-sm text-gray-600"
                            aria-expanded="true" aria-haspopup="true">
                            <svg class="cursor-pointer flex-none size-6 text-gray-600 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute right-0 z-10 mt-12 md:w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <x-dropdown-item href="/user/{{ $userId }}/perfil">Información del
                                perfil</x-dropdown-item>
                            @auth
                                {{-- Si el usuario autenticado es el mismo que el del post, muestra las opciones de editar y eliminar --}}
                                @if ($idUser == Auth::user()->id)
                                    <x-dropdown-item href="/user/muro/{{ $postId }}/edit">Editar</x-dropdown-item>
                                    <x-dropdown-item class="text-red-400 delete-btn">Eliminar</x-dropdown-item>
                                    <x-form action="/user/muro/{{ $postId }}" id="delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </x-form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $extension = pathinfo($postFileContent, PATHINFO_EXTENSION);
                switch ($extension) {
                    case 'mp4':
                    case 'webm':
                    case 'ogg':
                    case 'mkv':
                    case 'mov':
                    case 'avi':
                    // Bandera para detectar un video
                    $video = true;
                    ?>
            <video controls
                class="rounded-lg shadow-md cursor-pointer hover:shadow-zinc-800 transition-shadow duration-300 w-full max-h-100 object-contain">
                <source src="{{ asset('storage/' . $postFileContent) }}" type="video/{{ $extension }}">
                Tu navegador no soporta el elemento de video.
            </video>
            <?php
                    break;

                    default:
                        // Si no es un video, se asume que es una imagen
                        $video = false;
                        # code...
                        break;
                }
            ?>

            @if (!empty($postFileContent) && !$video)
                {{-- Si el archivo no es un video, muestra la imagen --}}
                <div class="flex items-center justify-center">
                    <img src="{{ asset($file) }}" class="rounded-lg w-full max-h-100 object-contain" />
                </div>
            @endif
            <div class="text-wrap break-words">
                <p class="w-full text-sm font-medium">
                    {{ $postDescripcion }}</p>
            </div>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end">
                <p class="text-md">Publicado el <b>{{ $postCreado }}</b>.</p>
                @if ($postCreado != $postActualizado)
                    <p class="text-sm">(Editado)</p>
                @endif
            </div>
        </div>
    </div>
</article>