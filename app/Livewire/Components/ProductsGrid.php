<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ProductsGrid extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(12);

        return view('livewire.products.grid', [
            'products' => $products,
        ]);
    }
}
