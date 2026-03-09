<?php

use App\Livewire\Components\ProductsGrid;
use App\Livewire\Components\ProductShow;
use App\Livewire\Components\RecommendedProducts;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth']], function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('/products', ProductsGrid::class)
        ->name('products.index');

    Route::get('/products/{product}', ProductShow::class)
        ->name('products.show');

    Route::get('/recommended-products', RecommendedProducts::class)
        ->name('products.recommended');
});

require __DIR__.'/auth.php';
