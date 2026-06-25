<?php

namespace App\Livewire\Collections;

use App\Models\Collection;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;

class CollectionGrid extends Component
{
    #[Url(keep: true)]
    public $slug = '';

    public function mount()
    {
        $this->slug = request()->query('slug', $this->slug);
    }

    public function selectCollection($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $collections = Collection::where('is_active', true)->get();
        
        $selectedCollection = null;
        $products = collect();

        if ($this->slug && $this->slug !== 'all') {
            $selectedCollection = Collection::where('slug', $this->slug)->first();
            if ($selectedCollection) {
                $products = Product::where('collection_id', $selectedCollection->id)->get();
            }
        } else {
            $products = Product::all();
        }

        return view('livewire.collections.collection-grid', [
            'collections' => $collections,
            'selectedCollection' => $selectedCollection,
            'products' => $products,
        ]);
    }
}
