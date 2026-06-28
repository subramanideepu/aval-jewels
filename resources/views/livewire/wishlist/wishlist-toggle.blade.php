<div>
    @if($variant === 'icon')
        <button wire:click.prevent="toggleWishlist" 
                class="w-10 h-10 rounded-full bg-white/90 border border-brand-gold/25 flex items-center justify-center text-brand-gold hover:bg-brand-gold hover:text-white transition-all duration-300 shadow-md group/heart-btn cursor-pointer"
                aria-label="{{ $isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 transition-transform duration-300 group-hover/heart-btn:scale-110" 
                 fill="{{ $isWishlisted ? 'currentColor' : 'none' }}" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>
    @else
        <button wire:click="toggleWishlist" 
                class="inline-flex justify-center items-center border border-brand-gold text-brand-gold px-8 py-4 text-[0.7rem] uppercase tracking-[0.2em] font-bold rounded-sm shadow-xl shadow-brand-gold/5 hover:bg-brand-gold hover:text-brand-green transition-all duration-500 hover:scale-105 cursor-pointer bg-transparent"
                aria-label="{{ $isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-4.5 w-4.5 mr-3 transition-transform duration-300 hover:scale-110" 
                 fill="{{ $isWishlisted ? 'currentColor' : 'none' }}" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span>{{ $isWishlisted ? 'Saved in wishlist' : 'Add to wishlist' }}</span>
        </button>
    @endif
</div>
