<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductsCart extends Component
{
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
