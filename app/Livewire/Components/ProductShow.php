<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductShow extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->trackViewedProduct();
    }

    protected function trackViewedProduct()
    {
        $viewed = session()->get('viewed_products', []);

        $viewed[] = $this->product->id;

        $viewed = array_slice(array_unique($viewed), -3);

        session()->put('viewed_products', $viewed);
    }

    public function render()
    {
        return view('livewire.products.show');
    }
}
