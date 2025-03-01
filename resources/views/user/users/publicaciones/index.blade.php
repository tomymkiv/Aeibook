<x-layout>
    <!--si no existe ninguna publicacion...-->
    {{-- <div class="flex flex-col justify-stretch h-screen items-center space-y-5 h-full">
        <div class="p-2 mt-20">
            <img src="{{ Vite::asset('resources/logo/png/logo-no-background.png') }}" alt="Logo" class="w-64">
        </div>

        <div class="space-y-5 flex flex-col items-center">
            <x-publi-button />
        </div>
    </div> --}}
    <!--si existe alguna publicacion...-->
    <x-muro.publicaciones>
        <x-slot:userPhoto>
            {{ Vite::asset('resources/images/image-not-found.png') }}
        </x-slot:userPhoto>
        <x-slot:username>otro usuario</x-slot:username>
        <x-slot:imgPosted>{{ Vite::asset('resources/images/pichu.png') }}</x-slot:imgPosted>
        <x-slot:descripcion>esto es la descripcion del usuario distinto
        </x-slot:descripcion>
    </x-muro.publicaciones>
</x-layout>
