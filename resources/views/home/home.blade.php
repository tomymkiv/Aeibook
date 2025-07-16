@php
    # Verifico si existen usuarios relacionados con posts
    $posts_avail = false;
    // dd($posts);
    foreach ($posts as $post) {
        if ($post->user) {
            $posts_avail = true;
        }
    }
@endphp
<x-layout>
    <section class="posts-container flex mt-10 flex-col mx-3">
        <div class="mx-3 mt-10">
            <h1 class="text-4xl">Página principal</h1>
        </div>
        @if (!$posts_avail)
            <x-not-publicaciones />
        @else
            <!--filtro ÚNICAMENTE los usuarios con posts
                habia un error que cuando eliminabas un usuario, su post seguía estando
                cuando realmente deberian eliminarse ambas cosas (en la base de datos se refleja bien, pero en tableplus no)
            -->
            @foreach ($posts as $post)
                @if ($post->user)
                    <x-publicaciones>
                        <x-slot:profilePhoto>{{ $post->user->profile_photo }}</x-slot:profilePhoto>
                        <x-slot:username>{{ $post->user->name }}</x-slot:username>
                        <x-slot:userId>{{ $post->user->id }}</x-slot:userId>
                        <x-slot:postId>{{ $post->id }}</x-slot:postId>
                        <x-slot:file>{{ $post->path }}</x-slot:file>
                        <x-slot:postDescripcion>{{ $post->descripcion }}</x-slot:postDescripcion>
                        <x-slot:postCreado>{{ $post->created_at }}</x-slot:postCreado>
                        <x-slot:postActualizado>{{ $post->updated_at }}</x-slot:postActualizado>
                    </x-publicaciones>
                @endif
            @endforeach
            <x-modal>
                <x-slot:modalTitle>Eliminar publicación</x-slot:modalTitle>
                <x-slot:modalDescription>¿Estás seguro que quieres eliminar esta publicación? Esta acción es
                    irreversible.</x-slot:modalDescription>
            </x-modal>
            <div class="new-posts">
                
            </div>
            <div class="flex flex-col items-center justify-center gap-5">
                <button id="btn-info" data-offset="{{ count($posts) }}" class="bg-gray-500 p-5 rounded-lg cursor-pointer w-full text-white/90 text-xl shadow-lg hover:shadow-zinc-800">Cargar más publicaciones</button>
                <p id="info" class="text-white/90 text-xl"></p>
                <span class="loader hidden"></span>
            </div>
        @endif
    </section>
    <script></script>
</x-layout>
