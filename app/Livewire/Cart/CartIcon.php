<?php

namespace App\Livewire\Cart;

use App\Services\CartService;
use Livewire\Component;

class CartIcon extends Component
{
    public $count = 0;

    protected $listeners = [
        'cartUpdated' => 'updateCount',
        'cartCountUpdated' => 'updateCount',
    ];

    public function mount(CartService $cartService)
    {
        $this->updateCount($cartService);
    }

    public function updateCount(CartService $cartService)
    {
        $this->count = $cartService->totalItems();
    }

    public function render()
    {
        return <<<'HTML'
        <button x-on:click="$dispatch('openCart')" class="relative text-white hover:text-brand-gold transition-colors p-2 flex items-center justify-center" aria-label="Open Shopping Cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            @if($count > 0)
                <span class="absolute -top-1 -right-1 bg-brand-gold text-brand-green text-[0.55rem] font-bold w-5.5 h-5.5 rounded-full flex items-center justify-center shadow-md">
                    {{ $count }}
                </span>
            @endif
        </button>
        HTML;
    }
}
