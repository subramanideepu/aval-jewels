<div {{ $attributes->merge(['class' => 'group relative aspect-[3/4] overflow-hidden bg-brand-maroon']) }}>
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:opacity-60">
    
    <div class="absolute inset-0 p-10 flex flex-col justify-end bg-gradient-to-t from-brand-maroon/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700">
        <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.4em] mb-3 translate-y-4 group-hover:translate-y-0 transition-transform duration-700">{{ $category }}</span>
        <h3 class="text-3xl font-heading text-white mb-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-700 delay-100">{{ $title }}</h3>
        <a href="{{ $link }}" class="inline-flex items-center text-brand-gold text-[0.65rem] uppercase tracking-widest font-bold translate-y-4 group-hover:translate-y-0 transition-transform duration-700 delay-200">
            Discover More
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>

    <!-- Border Overlay -->
    <div class="absolute inset-6 border border-brand-gold/0 group-hover:border-brand-gold/30 transition-all duration-700 pointer-events-none"></div>
</div>
