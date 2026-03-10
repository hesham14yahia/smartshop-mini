<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        $product = Product::factory()->create([
            'name' => 'Test Product',
            'description' => 'A test product',
            'price' => 19.99,
            'image' => 'test.jpg',
        ]);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Test Product', $product->name);
        $this->assertEquals('A test product', $product->description);
        $this->assertEquals(19.99, $product->price);
        $this->assertEquals('test.jpg', $product->image);
    }
}
