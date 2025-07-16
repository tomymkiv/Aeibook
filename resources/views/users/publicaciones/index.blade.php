<x-layout>
    {{-- @dd($user->id) --}}
    <!--si no existe ninguna publicacion...-->
    @if ($user->posts->count() == 0)
        <x-not-publicaciones>
            <x-slot:userId>{{ $user->id }}</x-slot:userId>
            <x-publi-button />
        </x-not-publicaciones>
    @else
        <!--si existe alguna publicacion...-->
        <div class="mt-20 mx-5">
            <h1 class="text-4xl text-white/75">Publicaciones de {{ $user->name }}</h1>
        </div>
        @foreach ($posts as $post)
            <x-publicaciones>
                <x-slot:profilePhoto>{{ $user->profile_photo }}</x-slot:profilePhoto>
                <x-slot:username>{{ $user->name }}</x-slot:username>
                <x-slot:userId>{{ $user->id }}</x-slot:userId>
                <x-slot:postId>{{ $post->id }}</x-slot:postId>
                <x-slot:file>{{ $post->path }}</x-slot:file>
                <x-slot:postDescripcion>{{ $post->descripcion }}</x-slot:postDescripcion>
                <x-slot:postCreado>{{ $post->created_at }}</x-slot:postCreado>
                <x-slot:postActualizado>{{ $post->updated_at }}</x-slot:postActualizado>
            </x-publicaciones>
        @endforeach
        <x-modal>
            <x-slot:modalTitle>Eliminar publicación</x-slot:modalTitle>
            <x-slot:modalDescription>¿Estás seguro que quieres eliminar esta publicación? Esta acción es
                irreversible.</x-slot:modalDescription>
        </x-modal>
        <div id="muro-container" data-user-id="{{ $user->id }}"></div>
        <div class="new-posts w-full max-w-sm sm:max-w-lg text-black/75 space-y-14">

        </div>
        <div class="flex flex-col items-center justify-center gap-5">
            <button id="btn-info" data-offset="{{ count($posts) }}"
                class="bg-gray-500 p-5 rounded-lg cursor-pointer w-full text-white/90 text-xl shadow-lg hover:shadow-zinc-800">Cargar
                más publicaciones</button>
            <p id="info" class="text-white/90 text-xl"></p>
            <span class="loader hidden"></span>
        </div>
    @endif
</x-layout>
