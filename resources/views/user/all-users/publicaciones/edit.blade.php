<x-layout>
    <section class="space-y-10 w-8/9 mx-3 sm:mx-0 sm:w-3/4 xl:w-1/2 h-screen flex flex-col items-center justify-center">
        <x-form method="POST" action="/user/muro/{{ $post->id }}/edit" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div>
                <h1 class="text-4xl">Edita tu publicación</h1>
            </div>
            <div class="flex flex-col gap-5">
                <div>
                    <x-label for="descripcion" class="text-2xl">Añade una descripción a tu publicación</x-label>
                </div>
                <div class="flex flex-col gap-3">
                    <textarea name="descripcion" id="descripcion" rows="30" class="rounded-md p-1 max-h-96 border border-white/30">{{ $post->descripcion }}</textarea>
                    <div class="flex flex-wrap justify-between items-end sm:gap-5">
                        <div class="flex items-center gap-5">
                            <div>
                                <x-label for="image" class="cursor-pointer text-xl">Añade una imagen a tu
                                    publicación</x-label>
                            </div>
                            <div>
                                <label for="file-upload"
                                    class="cursor-pointer relative w-24 h-24 rounded-full bg-transparent flex items-center justify-center overflow-hidden border-2 border-gray-300 hover:border-blue-500 transition">
                                    <div id="previewContainer">

                                        <img src="@if ($post->image) {{ asset($post->image) }} @endif"
                                            id="previewImage" class="rounded-full object-cover aspect-square">
                                    </div>
                                </label>
                                <x-input id="file-upload" type="file" name="image" class="hidden"
                                    accept="image/png, image/jpeg, image/jpg, image/webp, image/gif, 
                                        video/mp4, video/webm, video/ogg, video/mkv, video/mov, video/avi" />
                            </div>
                        </div>
                        <div>
                            <x-button type="submit">Editar publicación</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </x-form>
    </section>
</x-layout>
