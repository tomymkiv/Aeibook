<x-layout>
    {{-- @dd($users[0]->name) --}}
    <section class="space-y-12 w-full flex items-center flex-col mx-5">
        {{-- si existe al menos un usuario y no es el usuario logueado --}}
        {{-- @if() --}}
        @if ($users->count() > 0 && $users[0]->name != Auth::user()->name)
            <div>
                <h1 class="text-4xl">Resultados</h1>
            </div>
            @foreach ($users as $user)
                <!--Verifico para que no aparezca el usuario logueado-->
                @if (Auth::user()->name != $user->name)
                    <a href="/user/{{ $user->id }}/perfil"
                        class="bg-white/90 w-22/23 sm:w-3/4 xl:w-1/2 text-black/75 p-5 rounded-md flex flex-col gap-15 shadow-md hover:shadow-[#ffffff66] transition-shadow duration-500"
                        title="Ver perfil">
                        <div>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="flex items-start gap-5">
                                    <img src="{{ asset($user->profile_photo) }}" alt="Imagen del usuario"
                                        class="rounded-lg object-contain max-w-40">
                                    <div class="w-3/4 sm:w-1/2 p-3 rounded-xl">
                                        <p>Usuario: </p>
                                        <p class="font-semibold text-black/80 text-md">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
            <div>
                {{ $users->links() }}
            </div>
        @else
            <div>
                <h1 class="text-4xl">Sin resultados</h1>
            </div>
        @endif
    </section>
</x-layout>
