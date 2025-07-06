<x-form-layout>
    <x-slot:headingTitle>Crea tu cuenta</x-slot:headingTitle>
    <p class="text-sm text-white/60">Los campos con (*) son obligatorios.</p>
    <x-slot:logRegisterTitle>¿Tienes una cuenta?</x-slot:logRegisterTitle>
    <x-slot:logRegister href="/login">Haz click aquí</x-slot:logRegister>
    <x-form method="post" action="/register" enctype="multipart/form-data">
        @csrf
        <div>
            <x-label for="user">Usuario (*)</x-label>
            <x-input type="text" name="name" id="name" placeholder="Nombre de usuario" required />
            <x-error name="name" />
        </div>
        <div>
            <x-label for="email">Correo (*)</x-label>
            <x-input type="email" id="email" placeholder="Ej: example@gmail.com" name="email" required />
            <x-error name="email" />
        </div>
        <div>
            <x-label for="password">Contraseña (*)</x-label>
            <x-input type="password" id="password" name="password" required />
            <x-error name="password" />
        </div>
        <div>
            <x-label for="password_confirmation">Confirmar contraseña (*)</x-label>
            <x-input type="password" id="password_confirmation" name="password_confirmation" required />
            <x-error name="password_confirmation" />
        </div>
        <div class="flex flex-col gap-3 items-center lg:items-start">
            <x-label for="image">Imagen de perfil</x-label>
            <label for="file-upload"
                class="label-image cursor-pointer relative w-24 h-24 rounded-full bg-transparent flex items-center justify-center overflow-hidden border-2 border-gray-300 hover:border-blue-500 transition focus:outline-blue-500" tabindex="0">
                <div id="previewContainer" class="hidden">
                    <img id="previewImage" class="rounded-full object-cover aspect-square">
                </div>
            </label>
            <x-input id="file-upload" type="file" name="profile_photo" class="hidden" accept="image/*" />
            <x-error name="profile_photo" />
        </div>
        <div class="flex flex-col lg:flex-row gap-3 lg:gap-1 items-center justify-between space-y-10 lg:space-y-0">
            <div class="flex gap-4 items-center justify-center lg:justify-start w-full flex-wrap">
                <x-button type="submit">Registrarse</x-button>
                <a href="/home" class="text-white/75 hover:underline">Entrar como invitado</a>
            </div>
            <div class="flex items-end justify-center lg:justify-end w-1/2 gap-4 lg:gap-1.5 flex-wrap">
                <p class="text-lg text-white/75">¿Tienes una cuenta?</p>
                <x-redirect href="/login">Haz click aquí</x-redirect>
            </div>
        </div>
    </x-form>
</x-form-layout>
