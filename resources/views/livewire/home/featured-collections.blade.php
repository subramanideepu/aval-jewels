<section class="py-32 bg-brand-cream">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20">
            <div class="max-w-xl">
                <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Curated for Excellence</span>
                <h2 class="text-4xl md:text-6xl font-heading text-brand-maroon leading-tight">Masterpieces of Artistry</h2>
            </div>
            <a href="/collections" class="text-brand-gold hover:text-brand-maroon transition-all duration-500 font-body text-[0.65rem] uppercase tracking-[0.3em] border-b border-brand-gold/30 pb-2 hover:border-brand-maroon mt-8 md:mt-0">
                View All Collections
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($collections as $col)
                <x-collection-card 
                    :title="$col->name" 
                    :image="asset($col->image)" 
                    category="Collection" 
                    :link="'/collections?slug='.$col->slug" 
                />
            @endforeach
        </div>
    </div>
</section>
