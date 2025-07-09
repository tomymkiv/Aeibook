<x-layout>
    <section class="h-screen flex flex-col justify-around items-center gap-5 mt-10">
        <div class="flex items-center justify-center  p-10 md:p-0">
            <img src="{{ Vite::asset('resources/logo/png/logo-no-background.png') }}" class="w-full md:w-1/2 lg:w-1/3" />
        </div>
        <div>
            <h1 class="text-4xl text-white/50">¡Bienvenido!</h1>
        </div>
        <div>
            @guest
                <div class="flex flex-col items-center gap-5">
                    <a href="/register">
                        <h2 class="text-3xl text-white/50 hover:underline">Registrate aquí</h2>
                    </a>

                    <a href="/home">
                        <h2 class="text-3xl text-white/50 hover:underline">O entra como invitado</h2>
                    </a>
                @endguest
                @auth
                    <div>
                        <form method="post" action="/login" class="flex flex-col items-center gap-5">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}" class="hidden">
                            <input type="hidden" name="password" value="{{ auth()->user()->password }}" class="hidden">
                            <a href="/home">
                                <h2 class="text-3xl text-white/50 hover:underline">Ingresar a la página</h2>
                            </a>
                            <button type="submit" formaction="/logout">
                                <h2 class="cursor-pointer text-3xl text-white/50 hover:underline">Cerrar sesión</h2>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </section>
</x-layout>
