<?php
$classes = 'cursor-pointer bg-white/65 p-3 text-black/75 rounded-lg hover:bg-white/80 transition-background duration-300 w-auto';
if(!request()->is('login') && !request()->is('register')){
    $classes = "cursor-pointer bg-white/65 p-3 text-black/75 rounded-lg hover:bg-white/80 transition-background duration-300 w-full";
}
?>
<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
