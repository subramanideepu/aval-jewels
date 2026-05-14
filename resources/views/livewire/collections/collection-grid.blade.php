<section class="py-32 bg-brand-cream">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($collections as $col)
                <x-collection-card 
                    :title="$col->name" 
                    :image="asset($col->image)" 
                    category="Featured Collection" 
                    :link="'/collections?slug='.$col->slug" 
                />
            @endforeach
        </div>
    </div>
</section>
