<div>
    @if($banners->count() > 0)
        @php $hero = $banners->first(); @endphp
        <x-hero-section 
            :image="asset($hero->image)" 
            :title="$hero->title" 
            :subtitle="$hero->subtitle" 
            :ctaText="$hero->cta_text" 
            :ctaLink="$hero->cta_link" 
        />
    @else
        <x-hero-section 
            image="{{ asset('images/hero.png') }}" 
            title="Wear Your<br>Confidence Every Day" 
            subtitle="Est. 1990" 
            ctaText="Explore Collections" 
            ctaLink="/collections" 
        />
    @endif
</div>
