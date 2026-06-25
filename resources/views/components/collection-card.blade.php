<div {{ $attributes->merge(['class' => 'group relative aspect-[3/4] overflow-hidden bg-brand-green']) }}>
    <!-- Image -->
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-105 group-hover:opacity-75">
    
    <!-- Permanent subtle gradient to ensure readability -->
    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/20 to-transparent transition-opacity duration-700"></div>

    <!-- Content Container -->
    <div class="absolute inset-0 p-8 md:p-10 flex flex-col justify-end z-10">
        <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.4em] mb-2">{{ $category }}</span>
        <h3 class="text-2xl md:text-3xl font-heading text-white mb-3 transition-transform duration-500 group-hover:-translate-y-2">{{ $title }}</h3>
        
        <!-- Discover Link (Slide-in and Fade-in on hover) -->
        <div class="h-0 opacity-0 group-hover:h-8 group-hover:opacity-100 transition-all duration-500 overflow-hidden">
            <a href="{{ $link }}" class="inline-flex items-center text-brand-gold text-[0.65rem] uppercase tracking-widest font-bold">
                Discover More
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Premium Border Frame -->
    <div class="absolute inset-6 border border-brand-gold/10 group-hover:border-brand-gold/30 transition-all duration-700 pointer-events-none"></div>
</div>
