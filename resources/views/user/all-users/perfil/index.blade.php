<x-layout>
    <section class="w-3/4 lg:w-1/2">
        <div class="flex flex-col justify-evenly h-screen gap-10">
            <!--Si el usuario del perfil es el mismo que está logueado...-->
            @auth
                @if (Auth::user()->id === $user->id)
                    <div class="space-y-12">
                        <h1 class="text-4xl text-white/65">Este es tu perfil</h1>
                        <a href="/user/edit" class="text-3xl hover:underline text-white/65">Editar
                            perfil</a>
                    </div>
                @endif
            @endauth
            <div class="flex items-center gap-5">
                <div>
                    <h2 class="text-2xl text-white/65">Imagen de perfil</h2>
                </div>
                <img src="{{ asset($user->profile_photo) }}" alt="" class="rounded-full w-24 h-24 object-cover">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                <x-label for="name" class="mr-10">Usuario: </x-label>
                <p id="name" readonly class="select-none mt-0">{{ $user->name }}</p>
            </div>
            <div class="flex flex-col justify-center">
                <h4 class="text-2xl text-white/65">Total de publicaciones hechas: {{ $user->posts->count() }}</h4>
                <a href="/user/{{ $user->id }}/muro" class="hover:underline w-fit text-white/65">Ver publicaciones</a>
            </div>
        </div>
    </section>

</x-layout>
