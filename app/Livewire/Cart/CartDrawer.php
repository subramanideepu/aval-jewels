<?php

namespace App\Livewire\Cart;

use App\Services\CartService;
use Livewire\Component;

class CartDrawer extends Component
{
    public $cartItems = [];
    public $total = 0;
    public $isOpen = false;

    protected $listeners = [
        'cartUpdated' => 'loadCart',
        'toggleCart' => 'toggle',
        'openCart' => 'open',
    ];

    public function mount(CartService $cartService)
    {
        $this->loadCart($cartService);
    }

    public function loadCart(CartService $cartService)
    {
        $this->cartItems = $cartService->get();
        $this->total = $cartService->totalAmount();
    }

    public function incrementQuantity(CartService $cartService, $productId, $purity)
    {
        $items = $cartService->get();
        foreach ($items as $item) {
            if ($item['product_id'] == $productId && $item['purity'] == $purity) {
                $cartService->update($productId, $purity, $item['quantity'] + 1);
                break;
            }
        }
        $this->loadCart($cartService);
        $this->dispatch('cartCountUpdated');
    }

    public function decrementQuantity(CartService $cartService, $productId, $purity)
    {
        $items = $cartService->get();
        foreach ($items as $item) {
            if ($item['product_id'] == $productId && $item['purity'] == $purity) {
                $cartService->update($productId, $purity, $item['quantity'] - 1);
                break;
            }
        }
        $this->loadCart($cartService);
        $this->dispatch('cartCountUpdated');
    }

    public function removeItem(CartService $cartService, $productId, $purity)
    {
        $cartService->remove($productId, $purity);
        $this->loadCart($cartService);
        $this->dispatch('cartCountUpdated');
    }

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function open()
    {
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.cart.cart-drawer');
    }
}
