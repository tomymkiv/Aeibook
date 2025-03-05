<x-layout>
    <section class="w-3/4 lg:w-1/2">
        <div class="flex flex-col justify-evenly h-screen gap-10">
            <!--Si el usuario del perfil es el mismo que está logueado...-->
            @auth
                @if (Auth::user()->id === $user->id)
                    <div class="space-y-12">
                        <h1 class="text-4xl">Este es tu perfil</h1>
                        <a href="/user/edit" class="text-3xl hover:underline text-white/65">Editar
                            perfil</a>
                    </div>
                @endif
            @endauth
            <div class="flex items-center gap-5">
                <div>
                    <h2 class="text-2xl">Imagen de perfil</h2>
                </div>
                <img src="{{ asset($user->profile_photo) }}" alt="" class="rounded-full w-24 h-24 object-cover">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                <x-label for="name">Usuario: </x-label>
                <x-input style="margin-top: 0" type="text" id="name" readonly class="select-none mt-0"
                    value="{{ $user->name }}" />
            </div>
            <div class="flex flex-col justify-center">
                <h4 class="text-2xl">Total de publicaciones hechas: {{ $user->posts->count() }}</h4>
                <a href="/user/{{ $user->id }}/muro" class="hover:underline w-fit">Ver publicaciones</a>
            </div>
        </div>
    </section>

</x-layout>
