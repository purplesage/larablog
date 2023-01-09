@props(['active' => false])

@php

$classes = "hover:bg-blue-500 px-3 focus:bg-blue-500 hover:text-white";

if ($active) $classes .= " bg-blue-500 text-white";
    
@endphp

<a {{ $attributes(['class' => $classes]) }}>
  {{ $slot }}
</a>