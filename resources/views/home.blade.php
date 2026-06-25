<x-app-layout title="AVAL JEWELS | Handcrafted Luxury Jewelry">

    <livewire:home.hero-section />
    
    <section class="py-24 bg-brand-green text-white text-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl md:text-5xl font-heading mb-8">Wear Your Confidence</h2>
            <p class="text-brand-cream/60 text-lg font-body leading-relaxed">
                At AVAL JEWELS, we don't just sell jewelry; we curate moments of brilliance that last a lifetime. Explore our heritage of three decades.
            </p>
        </div>
    </section>

    <livewire:home.featured-collections />

    <section class="py-32 bg-brand-dark text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h3 class="text-brand-gold font-body text-xs uppercase tracking-[0.5em] mb-10 font-bold">Featured Video</h3>
            <div class="aspect-video max-w-5xl mx-auto bg-brand-maroon shadow-2xl relative group cursor-pointer overflow-hidden">
                <img src="{{ asset('images/hero.png') }}" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-1000 opacity-60">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-24 h-24 border border-brand-gold rounded-full flex items-center justify-center group-hover:bg-brand-gold group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brand-gold group-hover:text-brand-maroon ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <livewire:home.testimonials />

    <section class="py-32 bg-brand-cream">
        <div class="container mx-auto px-6 text-center">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Follow Our Journey</span>
            <h2 class="text-4xl md:text-5xl font-heading text-brand-maroon mb-16">@AVALJEWELS</h2>
            <x-instagram-gallery :items="[
                ['image' => asset('images/earrings.png')],
                ['image' => asset('images/necklace.png')],
                ['image' => asset('images/bangles.png')],
                ['image' => asset('images/earrings.png')],
                ['image' => asset('images/necklace.png')],
                ['image' => asset('images/bangles.png')],
            ]" />
        </div>
    </section>

    <section class="py-32 bg-brand-green text-white text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl md:text-6xl font-heading mb-10">Experience True Luxury</h2>
            <p class="text-brand-gold text-sm font-body uppercase tracking-[0.3em] mb-12">Visit our boutique for a personalized consultation.</p>
            <a href="{{ url('/contact') }}" class="btn-gold">Book Appointment</a>
        </div>
    </section>
</x-app-layout>
