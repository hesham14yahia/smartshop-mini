<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductsCart extends Component
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return;
        }

        session()->forget('cart');

        $this->products = collect();
        $this->totalPrice = 0;

        session()->flash('success', 'Order confirmed 🎉');

        $this->dispatch('cart-updated', cartCount: 0);
    }

    public function render()
    {
        $products = Product::whereIn('id', session()->get('cart', []))->get();

        $totalPrice = $products->sum(function ($product) {
            return $product->price;
        });

        return view('livewire.products.cart', [
            'products' => $products,
            'totalPrice' => $totalPrice,
        ]);
    }
}
