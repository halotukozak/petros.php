@props(['active'])

@php
$classes = ($active ?? false)
            ? 'transition-colors duration-200 transform text-gray-200 border-b-2 border-hoki mx-1.5 sm:mx-6'
            : 'border-b-2 border-transparent hover:text-gray-800 transition-colors duration-200 transform hover:text-gray-200 hover:border-hoki mx-1.5 sm:mx-6';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
