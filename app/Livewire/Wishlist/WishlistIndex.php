<?php

namespace App\Livewire\Wishlist;

use App\Services\CartService;
use App\Services\WishlistService;
use Livewire\Component;

class WishlistIndex extends Component
{
    public function removeFromWishlist(WishlistService $wishlistService, $productId)
    {
        $wishlistService->remove($productId);
        $this->dispatch('wishlistUpdated');
    }

    public function moveToCart(WishlistService $wishlistService, CartService $cartService, $productId)
    {
        $cartService->add($productId, 1, 'Standard');
        $wishlistService->remove($productId);
        
        $this->dispatch('wishlistUpdated');
        $this->dispatch('cartCountUpdated');
        
        session()->flash('message', 'Masterpiece moved to your shopping bag.');
    }

    public function render(WishlistService $wishlistService)
    {
        $products = $wishlistService->getProducts();
        return view('livewire.wishlist.wishlist-index', compact('products'))
            ->layout('components.app-layout', ['title' => 'Your Wishlist | AVAL JEWELS']);
    }
}
