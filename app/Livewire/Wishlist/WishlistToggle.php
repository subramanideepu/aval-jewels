<?php

namespace App\Livewire\Wishlist;

use App\Services\WishlistService;
use Livewire\Component;

class WishlistToggle extends Component
{
    public $productId;
    public $isWishlisted = false;
    public $variant = 'icon'; // 'icon' or 'button'

    public function mount(WishlistService $wishlistService, $productId, $variant = 'icon')
    {
        $this->productId = $productId;
        $this->variant = $variant;
        $this->isWishlisted = $wishlistService->has($productId);
    }

    public function toggleWishlist(WishlistService $wishlistService)
    {
        $this->isWishlisted = $wishlistService->toggle($this->productId);
        $this->dispatch('wishlistUpdated');
    }

    public function render()
    {
        return view('livewire.wishlist.wishlist-toggle');
    }
}
