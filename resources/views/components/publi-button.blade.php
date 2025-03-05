<div class="flex flex-col gap-3 mt-10">
    <div>
        <h3 class="text-2xl text-center">Crea tu publicación</h3>
    </div>
    <div class="flex justify-center">
        <a href="
        @auth /user/muro/create @endauth
        @guest /register @endguest
        "
            class="flex items-center justify-center w-fit">
            <div class="hover:bg-white/30 p-5 rounded-full transition-colors duration-400">
                <span class="relative -top-0.5 text-4xl">+</span>
            </div>
        </a>
    </div>
</div>
