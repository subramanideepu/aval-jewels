<?php

namespace App\Livewire\Collections;

use App\Models\Collection;
use Livewire\Component;

class CollectionGrid extends Component
{
    public $collections;

    public function mount()
    {
        $this->collections = Collection::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.collections.collection-grid');
    }
}
