<div class="bg-white/5 p-12 border border-brand-gold/10 relative group hover:border-brand-gold/30 transition-all duration-700">
    <div class="absolute -top-6 left-10 text-6xl font-heading text-brand-gold/20 group-hover:text-brand-gold/40 transition-colors duration-700">"</div>
    
    <p class="text-xl font-heading text-brand-cream/80 mb-10 leading-relaxed italic">
        {{ $content }}
    </p>
    
    <div class="flex items-center space-x-6">
        @if($image)
            <img src="{{ $image }}" alt="{{ $name }}" class="w-14 h-14 rounded-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
        @else
            <div class="w-14 h-14 rounded-full bg-brand-gold/10 flex items-center justify-center text-brand-gold font-heading text-xl">
                {{ substr($name, 0, 1) }}
            </div>
        @endif
        <div>
            <h5 class="text-white font-heading text-lg tracking-wide">{{ $name }}</h5>
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.3em]">{{ $title }}</span>
        </div>
    </div>
</div>
