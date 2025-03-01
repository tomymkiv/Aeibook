<x-layout>
    <section class="flex mt-10 flex-col mx-3">
        <div class="mx-3 mt-10">
            <h2 class="text-3xl">Todas las publicaciones</h2>
        </div>
        @if ($posts->count() === 0)
            <div class="flex flex-col justify-stretch h-screen items-center space-y-5 h-full">
                <div class="p-2 mt-20">
                    <img src="{{ Vite::asset('resources/logo/png/logo-no-background.png') }}" alt="Logo"
                        class="w-64">
                </div>
                <!--si no existe ninguna publicacion...-->
                <div class="space-y-5 flex flex-col items-center">
                    <x-publi-button />
                </div>
            </div>
        @else
            <!--si existe alguna publicacion...-->
            @foreach ($posts as $post)
                <x-muro.publicaciones>
                    <x-slot:userPhoto> {{ Vite::asset('resources/images/pichu.png') }} </x-slot:userPhoto>
                    <x-slot:username>Usuario {{ $post->user_id }}</x-slot:username>
                    <x-slot:imgPosted>{{ $post->image }}</x-slot:imgPosted>
                    <x-slot:descripcion>Descripcion: {{ $post->descripcion }}</x-slot:descripcion>
                </x-muro.publicaciones>
            @endforeach
            <div class="modal-container hidden relative z-10" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <!--
                  Background backdrop, show/hide based on modal state.
              
                  Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <!--
                      Modal panel, show/hide based on modal state.
              
                      Entering: "ease-out duration-300"
                        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        To: "opacity-100 translate-y-0 sm:scale-100"
                      Leaving: "ease-in duration-200"
                        From: "opacity-100 translate-y-0 sm:scale-100"
                        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    -->
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                        <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-base font-semibold text-gray-900" id="modal-title">Eliminar
                                            publicación
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">¿Estás seguro que quieres eliminar esta
                                                publicación?
                                                Esta acción será irreversible una vez realizada.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" form="delete-form"
                                    class="cursor-pointer inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Eliminar</button>
                                <button type="button"
                                    class="cursor-pointer mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto cancel-btn">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
</x-layout>
