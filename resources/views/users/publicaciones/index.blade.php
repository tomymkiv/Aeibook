<x-layout>
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
        @for ($i = 0; $i < $user->posts->count(); $i++)
            <x-publicaciones>
                <x-slot:profilePhoto>{{ $user->profile_photo }}</x-slot:profilePhoto>
                <x-slot:username>{{ $user->name }}</x-slot:username>
                <x-slot:userId>{{ $user->id }}</x-slot:userId>
                <x-slot:postId>{{ $user->posts[$i]->id }}</x-slot:postId>
                <x-slot:file>{{ $user->posts[$i]->path }}</x-slot:file>
                <x-slot:postDescripcion>{{ $user->posts[$i]->descripcion }}</x-slot:postDescripcion>
                <x-slot:postCreado>{{ $user->posts[$i]->created_at }}</x-slot:postCreado>
                <x-slot:postActualizado>{{ $user->posts[$i]->updated_at }}</x-slot:postActualizado>
            </x-publicaciones>
        @endfor
        <x-modal>
            <x-slot:modalTitle>Eliminar publicación</x-slot:modalTitle>
            <x-slot:modalDescription>¿Estás seguro que quieres eliminar esta publicación? Esta acción es irreversible.</x-slot:modalDescription>
        </x-modal>
    @endif
</x-layout>
