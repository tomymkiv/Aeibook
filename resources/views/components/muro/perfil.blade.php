@props(['sameUser' => false])

<section class="w-3/4 lg:w-1/2">
    <div class="flex flex-col justify-evenly h-screen gap-10">
        <!--condicional que pregunta si el perfil logueado es el mismo que el de este perfil.
                si es true, muestro este boton.
                sino, no
            
            -->
        @if ($sameUser)
            <div>
                <a href="/user/edit" class="text-3xl hover:underline text-white/65">Editar perfil</a>
            </div>
        @endif

        <div class="flex items-center gap-5">
            <div>
                <h2 class="text-2xl">Imagen de perfil</h2>
            </div>
            <img src="{{ Vite::asset('resources/images/man.jpeg') }}" alt=""
                class="rounded-full w-24 h-24 object-cover">
        </div>
        <div class="flex items-center gap-3">
            <x-label for="name">Usuario: </x-label>
            <x-input style="margin-top: 0" type="text" id="name" readonly class="select-none mt-0"
                value="{{ $username }}" />
        </div>
        <div class="flex flex-col justify-center">
            <h4 class="text-2xl">Total de publicaciones hechas: {{ rand(5, 1000) }}</h4>
            <a href="/user/{id}/post" class="hover:underline w-fit">Ver publicaciones</a>
        </div>
    </div>
</section>
