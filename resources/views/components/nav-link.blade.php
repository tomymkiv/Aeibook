@props(['active' => false])

<li class="mb-2 lg:mb-0 list-none">
    <a
        class="{{ $active ? 'font-bold' : 'font-normal' }} text-lg text-font-semibold block p-2 rounded hover:bg-black/40 transition-colors duration-250" {{$attributes}}>{{ $slot }}</a>
</li>
