<?php

namespace App\Livewire\Home;

use App\Models\Testimonial;
use Livewire\Component;

class Testimonials extends Component
{
    public $testimonials;

    public function mount()
    {
        $this->testimonials = Testimonial::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.home.testimonials');
    }
}
