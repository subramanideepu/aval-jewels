<x-app-layout title="Our Story | AVAL JEWELS">

    <!-- Header -->
    <section class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/craftsmanship.png') }}" alt="Our Story" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-brand-green/60"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.6em] mb-8 block font-bold">EST. 2022</span>
            <h1 class="text-6xl md:text-8xl text-white font-heading leading-tight">A Legacy of<br>Radiance</h1>
        </div>
    </section>

    <livewire:about.brand-story />

    <!-- Timeline/Values -->
    <section class="py-32 bg-brand-green text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <div class="space-y-6">
                    <div class="text-5xl font-heading text-brand-gold/40">01</div>
                    <h3 class="text-2xl font-heading text-brand-gold">Ethical Sourcing</h3>
                    <p class="text-brand-cream/60 font-body leading-relaxed">We source every gemstone and metal with extreme care, ensuring full transparency and ethical standards across our supply chain.</p>
                </div>
                <div class="space-y-6">
                    <div class="text-5xl font-heading text-brand-gold/40">02</div>
                    <h3 class="text-2xl font-heading text-brand-gold">Master Artistry</h3>
                    <p class="text-brand-cream/60 font-body leading-relaxed">Our artisans represent generations of inherited knowledge, blending traditional craftsmanship with contemporary design language.</p>
                </div>
                <div class="space-y-6">
                    <div class="text-5xl font-heading text-brand-gold/40">03</div>
                    <h3 class="text-2xl font-heading text-brand-gold">Lifelong Bond</h3>
                    <p class="text-brand-cream/60 font-body leading-relaxed">To us, jewelry is a lifetime investment. We provide lifelong maintenance and resizing services for every piece you purchase.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visual Divider -->
    <div class="h-96 w-full bg-fixed bg-center bg-cover" style="background-image: url('{{ asset('images/hero.png') }}')">
        <div class="w-full h-full bg-brand-green/40 backdrop-blur-[2px]"></div>
    </div>
</x-app-layout>
