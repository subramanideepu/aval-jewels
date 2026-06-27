<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $relatedProducts;
    public $quantity = 1;
    public $purity = '22K';

    public $whatsappNumber = '';

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
        
        $this->whatsappNumber = \App\Models\SiteSetting::where('key', 'whatsapp_number')->value('value') ?? '+919876543210';
        
        // Strip non-numeric characters for the wa.me link
        $this->whatsappNumber = preg_replace('/[^0-9]/', '', $this->whatsappNumber);

        $this->relatedProducts = Product::where('collection_id', $this->product->collection_id)
            ->where('id', '!=', $this->product->id)
            ->take(4)
            ->get();
    }

    public function addToCart(CartService $cartService)
    {
        $cartService->add($this->product->id, $this->quantity, $this->purity);
        
        $this->dispatch('cartUpdated');
        $this->dispatch('openCart');
        
        session()->flash('cart_success', 'Added to cart successfully!');
    }

    public function render()
    {
        return view('livewire.products.product-details')
            ->layout('layouts.app', [
                'title' => $this->product->meta_title ?? $this->product->name . ' | AVAL JEWELS',
                'metaDescription' => $this->product->meta_description ?? Str::limit(strip_tags($this->product->description), 160),
                'ogImage' => asset($this->product->image),
            ]);
    }
}
