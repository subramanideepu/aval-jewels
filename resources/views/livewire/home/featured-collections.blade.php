<section class="py-32 bg-brand-cream relative overflow-hidden">
    <!-- Decorative side vertical text -->
    <div class="hidden xl:block absolute left-8 top-1/2 -translate-y-1/2 select-none pointer-events-none">
        <span class="vertical-text text-[0.65rem] uppercase tracking-[0.6em] text-brand-green/20 font-body">HAUTE JOAILLERIE</span>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Editorial Header -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-28 border-b border-brand-gold/10 pb-8">
            <div class="max-w-2xl">
                <span class="text-brand-gold text-[0.65rem] uppercase tracking-[0.5em] mb-4 block font-bold">Curated for Excellence</span>
                <h2 class="text-5xl md:text-7xl font-heading text-brand-green leading-tight">
                    Masterpieces of <span class="text-editorial-gold">Artistry</span>
                </h2>
            </div>
            <a href="{{ url('/collections') }}" class="text-brand-gold hover:text-brand-green transition-all duration-500 font-body text-[0.65rem] uppercase tracking-[0.3em] border-b border-brand-gold/30 pb-2 hover:border-brand-green mt-8 lg:mt-0 font-bold">
                View All Collections
            </a>
        </div>

        @if($collections->count() >= 3)
            @php
                $col1 = $collections->get(0);
                $col2 = $collections->get(1);
                $col3 = $collections->get(2);
            @endphp
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-24 items-start">
                
                <!-- Left Column: Collection 1 (Large, Asymmetric Portrait) -->
                <div class="lg:col-span-7 space-y-8">
                    <div class="relative group">
                        <!-- Frame back effect -->
                        <div class="absolute -inset-4 border border-brand-gold/15 scale-100 group-hover:scale-98 transition-transform duration-1000"></div>
                        
                        <!-- Image wrapper -->
                        <div class="aspect-[4/5] overflow-hidden bg-brand-green relative luxury-outline-frame">
                            <img src="{{ asset($col1->image) }}" alt="{{ $col1->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                            <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-brand-dark/45 transition-colors duration-500"></div>
                        </div>

                        <!-- Overlapping info panel -->
                        <div class="relative lg:absolute mt-6 lg:mt-0 lg:-bottom-8 lg:-right-12 bg-white border border-brand-gold/20 shadow-2xl p-6 lg:p-8 max-w-full lg:max-w-md z-10 transition-transform duration-500 group-hover:translate-y-[-4px]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-brand-gold text-[0.55rem] uppercase tracking-[0.4em] font-bold">COLLECTION 01</span>
                                <span class="text-[0.65rem] text-brand-green/30 font-body">01 / 03</span>
                            </div>
                            <h3 class="text-2xl md:text-3xl font-heading text-brand-green mb-4">{{ $col1->name }}</h3>
                            <a href="{{ url('/collections?slug='.$col1->slug) }}" class="inline-flex items-center text-brand-gold hover:text-brand-green text-[0.65rem] uppercase tracking-widest font-bold transition-colors">
                                Discover Masterpiece
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Collection 2 (Staggered down on desktop) -->
                <div class="lg:col-span-5 lg:mt-32 space-y-12">
                    <div class="relative group">
                        <!-- Frame back effect -->
                        <div class="absolute -inset-4 border border-brand-gold/15 scale-100 group-hover:scale-98 transition-transform duration-1000"></div>

                        <!-- Image wrapper -->
                        <div class="aspect-[3/4] overflow-hidden bg-brand-green relative luxury-outline-frame">
                            <img src="{{ asset($col2->image) }}" alt="{{ $col2->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                            <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-brand-dark/45 transition-colors duration-500"></div>
                        </div>

                        <!-- Overlapping info panel -->
                        <div class="relative lg:absolute mt-6 lg:mt-0 lg:-bottom-8 lg:-left-12 bg-white border border-brand-gold/20 shadow-2xl p-6 lg:p-8 max-w-full lg:max-w-xs z-10 transition-transform duration-500 group-hover:translate-y-[-4px]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-brand-gold text-[0.55rem] uppercase tracking-[0.4em] font-bold">COLLECTION 02</span>
                                <span class="text-[0.65rem] text-brand-green/30 font-body">02 / 03</span>
                            </div>
                            <h3 class="text-xl md:text-2xl font-heading text-brand-green mb-4">{{ $col2->name }}</h3>
                            <a href="{{ url('/collections?slug='.$col2->slug) }}" class="inline-flex items-center text-brand-gold hover:text-brand-green text-[0.65rem] uppercase tracking-widest font-bold transition-colors">
                                Discover Masterpiece
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Row 3: Balanced Asymmetric layout with Editorial spacer and Collection 3 -->
                <div class="lg:col-span-4 lg:pr-12 pt-16 lg:pt-32 space-y-6">
                    <div class="w-16 h-px bg-brand-gold/30"></div>
                    <span class="text-[0.6rem] text-brand-gold uppercase tracking-[0.4em] block font-bold">The House Philosophy</span>
                    <p class="text-brand-green/60 font-body text-sm leading-relaxed">
                        Every single item in our collections represents hours of bespoke design work and high-precision crafting. Designed to be worn as daily statements or cherished as family heirlooms.
                    </p>
                </div>

                <div class="lg:col-span-8 pt-12 lg:pt-32 space-y-8">
                    <div class="relative group">
                        <!-- Frame back effect -->
                        <div class="absolute -inset-4 border border-brand-gold/15 scale-100 group-hover:scale-98 transition-transform duration-1000"></div>

                        <!-- Image wrapper (horizontal widescreen variant) -->
                        <div class="aspect-[16/9] overflow-hidden bg-brand-green relative luxury-outline-frame">
                            <img src="{{ asset($col3->image) }}" alt="{{ $col3->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                            <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-brand-dark/45 transition-colors duration-500"></div>
                        </div>

                        <!-- Overlapping info panel -->
                        <div class="relative lg:absolute mt-6 lg:mt-0 lg:-bottom-8 lg:-right-12 bg-white border border-brand-gold/20 shadow-2xl p-6 lg:p-8 max-w-full lg:max-w-md z-10 transition-transform duration-500 group-hover:translate-y-[-4px]">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-brand-gold text-[0.55rem] uppercase tracking-[0.4em] font-bold">COLLECTION 03</span>
                                <span class="text-[0.65rem] text-brand-green/30 font-body">03 / 03</span>
                            </div>
                            <h3 class="text-2xl md:text-3xl font-heading text-brand-green mb-4">{{ $col3->name }}</h3>
                            <a href="{{ url('/collections?slug='.$col3->slug) }}" class="inline-flex items-center text-brand-gold hover:text-brand-green text-[0.65rem] uppercase tracking-widest font-bold transition-colors">
                                Discover Masterpiece
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        @else
            <!-- Fallback standard premium grid for other than 3 items -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($collections as $col)
                    <x-collection-card 
                        :title="$col->name" 
                        :image="asset($col->image)" 
                        category="Collection" 
                        :link="url('/collections?slug='.$col->slug)" 
                    />
                @endforeach
            </div>
        @endif
    </div>
</section>
