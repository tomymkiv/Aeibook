<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @if (request()->is('login') ||
            request()->is('user/edit') ||
            request()->is('user/muro/*/edit') ||
            request()->is('user/muro/create'))
        @vite(['resources/js/vistaArchivo.js'])
    @endif

    @if (!request()->is('login') && !request()->is('register'))
        @vite(['resources/js/menu.js'])
        @vite(['resources/js/modal.js'])
        @vite(['resources/js/eliminarPost.js'])
    @endif
    @vite(['resources/js/info-publicaciones.js'])
    @vite(['resources/js/keydownImageContent.js'])
    @vite(['resources/js/postLoaderAJAX.js'])
</head>

<body class="font-sans antialiased bg-black/90 dark:text-white/50">
    @if (!request()->is('/'))
        <div class="flex flex-col lg:flex-row justify-between">
            <section class="fixed w-0 menu-sec h-screen lg:w-fit">
                <header class="lg:w-fit">
                    <button
                        class="menuBtn w-6 absolute cursor-pointer fill-white/50 hover:fill-white/80 transition-colors duration-300 h-16 w-16">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="p-5 bars bg-black/65 transition-background duration-300"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </button>
                    <aside
                        class="transition-all w-0 aside-nav duration-350 lg:w-64 h-screen bg-black/65 text-white flex flex-col lg:justify-between gap-10 overflow-hidden">
                        <section class="lg:hidden w-full">
                            <div
                                class="py-5 text-black/50 dark:text-white/50 flex flex-col gap-5 justify-center items-center stickytop-0 w-full">
                                @auth
                                    <div class="flex flex-col items-center gap-3 justify-center">
                                        <img src="{{ asset($user->profile_photo) }}" alt="Imagen del usuario"
                                            class="rounded-full w-full max-w-35 object-cover aspect-square">
                                        <p class="font-semibold text-white/80 text-xl">{{ $user->name }}</p>
                                    </div>
                                @endauth
                                <div class="justify-self-center">
                                    <form action="/search" class="flex flex-col xl:flex-row items-end gap-3">
                                        @csrf
                                        <x-input type="text" name="q" placeholder="Busca un usuario" />
                                        {{-- <x-button type="submit" class="w-full xl:w-fit">Buscar</x-button> --}}
                                    </form>
                                </div>
                            </div>
                        </section>
                        <nav class="mt-12">
                            <h3 class="text-2xl font-bold mb-6">Menú</h3>
                            <ul>
                                <x-nav-link href="/home" :active="request()->is('home')">Inicio</x-nav-link>
                                @auth
                                    <x-nav-link href="/user/{{ $user->id }}/perfil" :active="request()->is('user/' . Auth::user()->id . '/perfil')">Mi
                                        perfil</x-nav-link>
                                    <x-nav-link href="/user/{{ Auth::user()->id }}/muro" :active="request()->is('user/' . Auth::user()->id . '/muro')">Mis
                                        publicaciones</x-nav-link>
                                    <x-nav-link href="/user/settings" :active="request()->is('user/settings')">Configuración</x-nav-link>
                                @endauth
                                @guest
                                    <x-nav-link href="/login">Iniciar sesión</x-nav-link>
                                    <x-nav-link href="/register">Registrarse</x-nav-link>
                                @endguest
                                @auth
                                    <form action="/logout" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <li class="list-none ">
                                            <button type="submit"
                                                class="text-start text-lg text-font-semibold block p-2 rounded hover:bg-black/40 transition-colors duration-250 cursor-pointer w-full">Cerrar
                                                sesión</button>
                                        </li>
                                    </form>
                                @endauth
                            </ul>
                        </nav>
                        <x-publi-button />
                    </aside>
                </header>
            </section>
    @endif
    <div class="text-black/50 dark:text-white/50 justify-self-center lg:mx-8 lg:mx-3 mb-10 w-full">
        <main class="my-6 flex flex-col items-center justify-center w-full">
            {{ $slot }}
        </main>
    </div>
    @if (
        !request()->is('/') &&
            !request()->is('user/edit') &&
            !request()->is('user/muro/create') &&
            !request()->is('user/{{ $user->id }}/perfil'))
        <section class="hidden lg:block fixed lg:static w-full lg:w-1/2 lg:w-1/3 bg-white/10 lg:bg-transparent">
            <div
                class="lg:p-8 py-5 lg:px-5 text-black/50 lg:dark:bg-black/50 dark:text-white/50 flex gap-5 lg:items-start justify-self-center sticky lg:h-screen top-0 lg:w-full flex-col">
                {{-- @auth --}}
                @auth
                    <div class="flex flex-col items-center gap-3 justify-center w-full">
                        <div>
                            <img src="{{ asset($user->profile_photo) }}" alt="Imagen del usuario"
                                class="rounded-full lg:w-32 lg:h-32 object-cover">
                        </div>
                        <div>
                            <p class="text-white/80">{{ $user->name }}</p>
                        </div>
                    </div>
                @endauth

                {{-- @endauth --}}
                <div class="w-full">
                    <form action="/search" class="flex flex-col xl:flex-row items-end gap-3">
                        @csrf
                        <x-input type="text" name="q" placeholder="Busca un usuario" />
                        <x-button type="submit" class="w-full xl:w-fit">Buscar</x-button>
                    </form>
                </div>
                <div class="lg:hidden">
                    <button class="bg-black/25 p-4 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black/60"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    @endif
    </div>
    @if (!request()->is('/'))
        <footer class="bg-black/65 text-white py-6">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex flex-col lg:flex-row justify-between items-center">
                    <p class="text-sm">&copy; Esto no tiene copyright. Solo está para verse lindo</p>
                    <nav class="flex items-center justify-center flex-wrap gap-4 mt-4 lg:mt-0">
                        <x-nav-link href="/home" :active="request()->is('home')">Inicio</x-nav-link>
                        @auth
                            <x-nav-link href="/user/{{ $user->id }}/perfil" :active="request()->is('user/' . $user->id . '/perfil')">Mi perfil</x-nav-link>
                            <x-nav-link href="/user/{{ $user->id }}/muro" :active="request()->is('user/' . $user->id . '/muro')">Mis
                                publicaciones</x-nav-link>
                        @endauth
                    </nav>
                </div>
            </div>
        </footer>
    @endif
</body>

</html>
