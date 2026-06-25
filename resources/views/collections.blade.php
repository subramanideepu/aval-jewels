<x-app-layout title="Our Collections | AVAL JEWELS">

    <!-- Page Header -->
    <section class="relative pt-48 pb-32 bg-brand-green overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-6xl md:text-8xl text-white font-heading mb-8">The Collections</h1>
            <p class="text-brand-gold text-[0.65rem] uppercase tracking-[0.6em] font-bold">Artistry in Every Detail</p>
        </div>
    </section>

    <!-- Filters placeholder -->
    <div class="bg-brand-cream border-b border-brand-green/5 sticky top-20 z-40">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-wrap items-center justify-center space-x-12">
                <a href="#" class="text-[0.65rem] uppercase tracking-widest font-bold border-b-2 border-brand-gold pb-1">All Pieces</a>
                <a href="#" class="text-[0.65rem] uppercase tracking-widest text-brand-green/40 hover:text-brand-green transition-colors font-bold">Bridal</a>
                <a href="#" class="text-[0.65rem] uppercase tracking-widest text-brand-green/40 hover:text-brand-green transition-colors font-bold">Earrings</a>
                <a href="#" class="text-[0.65rem] uppercase tracking-widest text-brand-green/40 hover:text-brand-green transition-colors font-bold">Necklaces</a>
                <a href="#" class="text-[0.65rem] uppercase tracking-widest text-brand-green/40 hover:text-brand-green transition-colors font-bold">Bangles</a>
            </div>
        </div>
    </div>

    <livewire:collections.collection-grid />

    <!-- CTA Section -->
    <section class="py-32 bg-brand-dark text-white text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl md:text-5xl font-heading mb-10">Bespoke Creations</h2>
            <p class="text-brand-cream/60 max-w-2xl mx-auto mb-12 font-body leading-relaxed">
                If you have a unique vision, our master designers can bring it to life. Contact our concierge for a private design consultation.
            </p>
            <a href="{{ url('/contact') }}" class="inline-flex items-center text-brand-gold text-xs font-bold uppercase tracking-[0.3em] group">
                Consult Our Designer
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </section>
</x-app-layout>
