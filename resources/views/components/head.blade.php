<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @if (request()->is('register') ||
            request()->is('login') ||
            request()->is('user/edit') ||
            request()->is('user/muro/edit'))
        @vite(['resources/js/vistaArchivo.js'])
    @endif

    @vite(['resources/js/modal.js'])
    @if (!request()->is('login') && !request()->is('register'))
        @vite(['resources/js/menu.js'])
    @endif
    @vite(['resources/js/info-publicaciones.js'])
</head>
