<x-layout>
    <section class="flex items-center justify-center mx-5 flex size-full h-screen">
        <div class="flex flex-col gap-2 p-3">
            <div class="flex w-full">
                <a href="/user/{{ Auth::user()->id }}/perfil">
                    <x-button href="/user/perfil" class="font-semibold">Ver
                        usuario</x-button>
                </a>
            </div>
            <div class="flex w-full">
                <a href="/user/edit">
                    <x-button href="/user/perfil" class="font-semibold">Editar
                        usuario</x-button>
                </a>
            </div>
            <div class="w-full">
                <x-form action="/user/{{ Auth::user()->id }}" class="hidden" method="post" id="delete-form">
                    @csrf
                    @method('DELETE')
                </x-form>
                <x-button type="submit" class="delete-btn text-red-500 font-semibold">Eliminar
                    usuario</x-button>
            </div>
        </div>
        <x-modal>
            <x-slot:modalTitle>Eliminar usuario</x-slot:modalTitle>
            <x-slot:modalDescription>¿Estás seguro que quieres eliminar al usuario <b>{{ Auth::user()->name }}</b>? Esta
                acción es irreversible y no se podrá volver para atrás.</x-slot:modalDescription>
        </x-modal>
    </section>

</x-layout>
