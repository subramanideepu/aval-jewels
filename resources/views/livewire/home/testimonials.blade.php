<section class="py-32 bg-brand-maroon relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-20">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Client Stories</span>
            <h2 class="text-4xl md:text-5xl font-heading text-white">Voices of Radiance</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($testimonials as $t)
                <x-testimonial-card 
                    :name="$t->client_name" 
                    :content="$t->content" 
                    title="Valued Client" 
                    :image="asset($t->image)" 
                />
            @endforeach
        </div>
    </div>
</section>
