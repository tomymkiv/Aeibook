<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @vite(['resources/js/vistaArchivo.js'])
    @vite(['resources/js/modal.js'])
    @if (!request()->is('login') && !request()->is('register'))
        @vite(['resources/js/menu.js'])
    @endif
    @vite(['resources/js/info-publicaciones.js'])
</head>
