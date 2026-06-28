@props([
    'size' => 'md',
    'class' => '',
    'link' => true,
])

@php
    $sizes = [
        'xs' => 'h-10',
        'sm' => 'h-14 md:h-16',
        'md' => 'h-20 md:h-24',
        'lg' => 'h-28 md:h-32',
        'xl' => 'h-36 md:h-44',
        '2xl' => 'h-44 md:h-56',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

@if($link)
<a href="{{ url('/') }}" class="inline-block group {{ $class }}" aria-label="AVAL JEWELS - Tradition. Elegance. You.">
    <img 
        src="{{ asset('assets/images/branding/aval-jewels-logo.png') }}" 
        alt="AVAL JEWELS - Tradition. Elegance. You." 
        class="{{ $sizeClass }} w-auto object-contain transition-transform duration-500 group-hover:scale-105"
        loading="{{ $size === 'xs' || $size === 'sm' ? 'eager' : 'lazy' }}"
    >
</a>
@else
<div class="inline-block {{ $class }}">
    <img 
        src="{{ asset('assets/images/branding/aval-jewels-logo.png') }}" 
        alt="AVAL JEWELS - Tradition. Elegance. You." 
        class="{{ $sizeClass }} w-auto object-contain"
        loading="{{ $size === 'xs' || $size === 'sm' ? 'eager' : 'lazy' }}"
    >
</div>
@endif
