<x-layout>
    <section class="mt-24 mx-6 flex items-center justify-center">
        <x-form method="post" action="user/edit" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="flex gap-3 items-center">
                <x-label for="profile_photo">Cambia tu imagen de perfil</x-label>
                <label for="file-upload"
                    class="relative w-24 h-24 rounded-full bg-transparent flex items-center justify-center overflow-hidden border-2 border-gray-300 hover:border-blue-500 transition">
                    <!-- Imagen dentro -->
                    <img src="{{ Vite::asset('resources/images/image-not-found.png') }}{{-- ruta de la imagen de perfil (en caso de tener)
                    si no tiene, será "image-not-found.png"
                    --}}"
                        class="w-full h-full object-cover user-photo">

                    <div id="previewContainer" class="hidden">
                        <img id="previewImage" class="rounded-full object-cover aspect-square">
                    </div>
                </label>
                <x-input id="file-upload" type="file" name="profile_photo" class="hidden" accept="image/*" />
            </div>
            <div>
                <x-label for="user">Cambia tu nombre de usuario</x-label>
                <x-input type="text" name="user" id="user" placeholder="Nuevo usuario"
                    value="nombre actual" />
            </div>
            <div>
                <x-label for="email">Cambia tu correo</x-label>
                <x-input type="email" name="email" id="email" placeholder="Nuevo correo"
                    value="correo actual" />
            </div>
            <div>
                <x-label for="password">Cambia tu contraseña</x-label>
                <x-input type="password" name="password" id="password" />
            </div>
            <div>
                <x-label for="password_confirmation">Confirma tu contraseña</x-label>
                <x-input type="password" name="password_confirmation" id="password_confirmation" />
            </div>
            <div>
                <x-button type="submit">Completar</x-button>
            </div>
        </x-form>
    </section>
</x-layout>
