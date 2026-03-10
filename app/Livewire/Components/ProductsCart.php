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

        // Example: create order (optional)
        // Order::create([...]);

        // Clear cart
        session()->forget('cart');

        // Update UI
        $this->products = collect();
        $this->totalPrice = 0;

        session()->flash('success', 'Order confirmed 🎉');

        // update navbar cart counter
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
