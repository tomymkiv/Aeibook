<article class="text-black/75 max-w-4xl mx-3 mt-24 space-y-14">
    <div class="p-10 sm:min-w-xl xl:min-w-3xl bg-white/70 rounded-lg">
        <div class="space-y-12">
            <div class="flex flex-row items-center gap-3">
                <span
                    class="w-20 h-20 flex items-center justify-center border-white/30 rounded-full aspect-square object-cover">
                    <x-rounded-img src="{{ $userPhoto }}" />
                </span>
                <h5 class="text-lg w-full font-semibold">{{ $username }}<!--tito--></h5>
                <div class="relative flex justify-end">
                    <div class="info-button w-fit flex justify-end">
                        <button type="button"
                            class="cursor-pointer hover:bg-black/20 transition-background duration-300 rounded-full inline-flex justify-center gap-x-1.5 px-3 py-2 text-sm text-gray-600"
                            aria-expanded="true" aria-haspopup="true">
                            <svg class="cursor-pointer flex-none size-6 text-gray-600 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute right-0 z-10 mt-12 md:w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <x-dropdown-item href="/user/perfil">Información del perfil</x-dropdown-item>
                            <x-dropdown-item href="/user/muro/edit">Editar</x-dropdown-item>
                            <x-dropdown-item class="text-red-400 delete-post-btn">Eliminar</x-dropdown-item>
                            <x-form action="/destroy" id="delete-form" class="hidden">
                                @csrf
                                @method('DELETE')
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{ $imgPosted }}" class="max-w-2xl max-h-125" />
            </div>
            <div class="p-2">
                <p>{{ $descripcion }}</p><!--descripcion de la publicacion-->
            </div>
        </div>
    </div>
</article>
