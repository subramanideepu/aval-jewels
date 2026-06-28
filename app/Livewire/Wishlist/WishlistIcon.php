<?php

namespace App\Livewire\Wishlist;

use App\Services\WishlistService;
use Livewire\Component;

class WishlistIcon extends Component
{
    public $count = 0;

    protected $listeners = [
        'wishlistUpdated' => 'updateCount',
    ];

    public function mount(WishlistService $wishlistService)
    {
        $this->updateCount($wishlistService);
    }

    public function updateCount(WishlistService $wishlistService)
    {
        $this->count = $wishlistService->count();
    }

    public function render()
    {
        return view('livewire.wishlist.wishlist-icon');
    }
}
