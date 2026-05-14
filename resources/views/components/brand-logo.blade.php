@props([
    'size' => 'md',
    'class' => '',
    'link' => true,
])

@php
    $sizes = [
        'xs' => 'h-8',
        'sm' => 'h-10',
        'md' => 'h-14 md:h-16',
        'lg' => 'h-20 md:h-24',
        'xl' => 'h-28 md:h-36',
        '2xl' => 'h-36 md:h-48',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

@if($link)
<a href="/" class="inline-block group {{ $class }}" aria-label="AVAL JEWELS - Tradition. Elegance. You.">
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
