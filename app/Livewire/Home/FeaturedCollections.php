<?php

namespace App\Livewire\Home;

use App\Models\Collection;
use Livewire\Component;

class FeaturedCollections extends Component
{
    public $collections;

    public function mount()
    {
        $this->collections = Collection::where('is_active', true)->take(3)->get();
    }

    public function render()
    {
        return view('livewire.home.featured-collections');
    }
}
