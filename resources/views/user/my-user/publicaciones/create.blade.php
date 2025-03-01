<x-layout>
    <section class="space-y-10 w-3/4 xl:w-1/2 h-screen flex flex-col items-center justify-center">
        <x-form method="post" action="/create" enctype="multipart/form-data">
            @csrf
            <div>
                <h1 class="text-4xl">Crea tu publicación</h1>
            </div>
            <div class="flex flex-col gap-5">
                <div>
                    <x-label for="descripcion" class="text-2xl">Añade una descripción a tu publicación (*)</x-label>
                </div>
                <div class="flex flex-col gap-3">
                    <textarea name="descripcion" id="descripcion" rows="30" class="rounded-md p-1 max-h-96 border border-white/30"></textarea>
                    <div class="flex justify-end">
                        <div class="flex items-center gap-5">
                            <div>
                                <x-label for="image" class="cursor-pointer text-xl">Añade una imagen a tu
                                    publicación</x-label>
                            </div>
                            <div>
                                <label for="file-upload"
                                    class="relative w-24 h-24 rounded-full bg-transparent flex items-center justify-center overflow-hidden border-2 border-gray-300 hover:border-blue-500 transition">
                                    <div id="previewContainer" class="hidden">
                                        <img id="previewImage" class="rounded-full object-cover aspect-square">
                                    </div>
                                </label>
                                <x-input id="file-upload" type="file" name="profile_photo" class="hidden" accept="image/*" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-8 mt-5">

                </div>
            </div>
        </x-form>
    </section>
</x-layout>
