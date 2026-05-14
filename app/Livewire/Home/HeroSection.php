<?php

namespace App\Livewire\Home;

use App\Models\HeroBanner;
use Livewire\Component;

class HeroSection extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = HeroBanner::where('is_active', true)->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.home.hero-section');
    }
}
