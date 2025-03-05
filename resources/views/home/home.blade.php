<x-layout>
    <section class="flex mt-10 flex-col mx-3">
        <div class="mx-3 mt-10">
            <h1 class="text-4xl">Página principal</h1>
        </div>
        @if (!$posts)
            <x-not-publicaciones>
                <x-slot:userId>{{ $user->id }}</x-slot:userId>
            </x-not-publicaciones>
        @else
            <!--filtro los usuarios con posts-->
            @foreach ($posts as $post)
                <x-publicaciones>
                    <x-slot:profilePhoto>{{ $post->user->profile_photo }}</x-slot:profilePhoto>
                    <x-slot:username>{{ $post->user->name }}</x-slot:username>
                    <x-slot:userId>{{ $post->user->id }}</x-slot:userId>
                    <x-slot:postId>{{ $post->id }}</x-slot:postId>
                    <x-slot:postImage>{{ $post->image }}</x-slot:postImage>
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
        @endif
    </section>
</x-layout>
