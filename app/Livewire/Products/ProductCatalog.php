<?php

namespace App\Livewire\Products;

use App\Models\Collection;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;

class ProductCatalog extends Component
{
    #[Url(keep: true)]
    public $search = '';

    #[Url(keep: true)]
    public $selectedCollection = '';

    #[Url(keep: true)]
    public $sort = 'default';

    public function updatingSearch()
    {
        // Reset page if we had pagination (optional, but clean)
    }

    public function selectCollection($slug)
    {
        $this->selectedCollection = $slug;
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedCollection = '';
        $this->sort = 'default';
    }

    public function render()
    {
        $collections = Collection::where('is_active', true)->get();

        $query = Product::query()
            ->whereHas('collection', function ($q) {
                $q->where('is_active', true);
            });

        // Apply Search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply Collection Filter
        if ($this->selectedCollection && $this->selectedCollection !== 'all') {
            $query->whereHas('collection', function ($q) {
                $q->where('slug', $this->selectedCollection);
            });
        }

        // Apply Sorting
        if ($this->sort === 'price_asc') {
            $query->orderByRaw('COALESCE(sale_price, price) ASC');
        } elseif ($this->sort === 'price_desc') {
            $query->orderByRaw('COALESCE(sale_price, price) DESC');
        } elseif ($this->sort === 'best_sellers') {
            $query->orderBy('is_best_seller', 'DESC');
        } else {
            $query->orderBy('created_at', 'DESC');
        }

        $products = $query->get();

        return view('livewire.products.product-catalog', [
            'collections' => $collections,
            'products' => $products,
        ])->layout('layouts.app', [
            'title' => 'Shop Luxury Masterpieces | AVAL JEWELS',
            'metaDescription' => 'Explore the complete collections of handcrafted gold, diamond, and rubies jewelry at AVAL JEWELS.',
        ]);
    }
}
