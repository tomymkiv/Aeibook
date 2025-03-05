<div class="h-uto">
    <div class="mt-20 mx-5">
        <h1 class="text-4xl text-center text-white/75">Aun no hay publicaciones de este usuario</h1>
    </div>
    @auth
        @if (Auth::user()->id === $userId)
            <div class="flex flex-col justify-stretch h-screen items-center space-y-5 h-full">
                <div class="space-y-5 flex flex-col items-center">
                    <x-publi-button />
                </div>
            </div>
        @endif
    @endauth
</div>
