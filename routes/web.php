<?php

use App\Livewire\Components\ProductsGrid;
use App\Livewire\Components\ProductShow;
use App\Livewire\Components\RecommendedProducts;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/products', ProductsGrid::class)
    ->middleware(['auth'])
    ->name('products.index');

Route::get('/products/{product}', ProductShow::class)
    ->middleware(['auth'])
->name('products.show');

Route::get('/recommended-products', RecommendedProducts::class)
    ->middleware(['auth'])
->name('products.recommended');

require __DIR__.'/auth.php';
