<?php

namespace App\Livewire;

use App\Models\HeroSlider as HeroSliderModel;
use Livewire\Component;

class HeroSlider extends Component
{
    public function render()
    {
        $sliders = HeroSliderModel::where('is_active', true)->orderBy('order')->get();

        return view('livewire.hero-slider', compact('sliders'));
    }
}
