<x-form-layout :login="true">
    <x-slot:headingTitle>Inicia sesión</x-slot:headingTitle>
    <x-slot:logRegisterTitle>¿No tienes una cuenta?</x-slot:logRegisterTitle>
    <x-slot:logRegister href="/register">Haz click aquí</x-slot:logRegister>
    <x-form method="post" action="/login" >
        @csrf
        <div>
            <x-label for="email">Correo</x-label>
            <x-input type="email" id="email" placeholder="Ej: example@gmail.com" name="email" required />
            <x-error name="email"/>
        </div>
        <div>
            <x-label for="password">Contraseña</x-label>
            <x-input type="password" id="password" name="password" required />
            <x-error name="password"/>
        </div>
        <div class="flex flex-col lg:flex-row gap-3 items-center justify-between space-y-10 lg:space-y-0">
            <div class="flex gap-4 items-center justify-center lg:justify-start w-full flex-wrap">
                <x-button type="submit">Iniciar sesión</x-button>
                <a href="/home" class="text-white/75 hover:underline">Entrar como invitado</a>
            </div>
            <div class="flex items-end justify-center lg:justify-end w-1/2 gap-4 lg:gap-1.5 flex-wrap">
                <p class="text-lg text-white/75 text-center">¿No tienes una cuenta?</p>
                <x-redirect href="/register">Haz click aquí</x-redirect>
            </div>
        </div>
    </x-form>
</x-form-layout>
