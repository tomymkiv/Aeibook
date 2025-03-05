@props(['login' => false])

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/js/vistaArchivo.js'])
</head>

<body class=" {{ $login ? 'justify-center' : 'justify-stretch' }} bg-black/90 h-screen flex flex-col lg:justify-center">
    <main class="p-5 flex items-center flex-col lg:flex-row mt-8 lg:mt-0">
        <div class="hidden lg:flex m-auto p-5 lg:p-0 lg:w-1/2 flex justify-center">
            <img src="{{ Vite::asset('resources/logo/png/logo-no-background.png') }}" width="60%" />
        </div>
        <div class="flex flex-col justify-center w-full lg:w-1/2">
            <div class="flex items-end justify-between my-10 text-center lg:text-start">
                <h1 class="text-4xl text-white/80">{{ $headingTitle }} </h1>
                @if (request()->is('register'))
                    <form action="/fakeUser" method="post">
                        @csrf
                        <div
                            class="flex flex-col lg:flex-row gap-3 lg:gap-1 items-center justify-between space-y-10 lg:space-y-0">
                            <x-button type="submit">Crear usuario rápido</x-button>
                        </div>
                    </form>
                @endif
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
