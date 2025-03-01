<form {{ $attributes->merge(['class' => 'space-y-12 w-full flex flex-col justify-center']) }} >
    {{ $slot }}
</form>