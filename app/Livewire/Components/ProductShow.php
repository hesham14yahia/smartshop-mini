<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductShow extends Component
{
    public Product $product;

    public $cart = [];

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->trackViewedProduct();
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);
        $cart[$this->product->id] = ($cart[$this->product->id] ?? 0) + 1;
        session(['cart' => $cart]);

        $this->dispatch('notify', [
            'message' => $this->product->name.' added to cart!',
        ]);
        $this->dispatch('cart-updated', cartCount: count(session('cart')));
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
