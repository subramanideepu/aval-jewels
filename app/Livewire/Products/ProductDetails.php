<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $relatedProducts;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
        
        $this->relatedProducts = Product::where('collection_id', $this->product->collection_id)
            ->where('id', '!=', $this->product->id)
            ->take(4)
            ->get();
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
