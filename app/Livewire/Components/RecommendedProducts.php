<?php

namespace App\Livewire\Components;

use App\Services\AiRecommendationService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class RecommendedProducts extends Component
{
    public $recommended = [];

    public function mount(AiRecommendationService $ai)
    {
        $lastViewed = session()->get('viewed_products', []);
        $this->recommended = $ai->recommend($lastViewed);
    }

    public function render()
    {
        return view('livewire.products.recommended', [
            'products' => $this->recommended,
        ]);
    }
}
