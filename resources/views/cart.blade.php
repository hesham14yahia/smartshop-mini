<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    @php
        $cart = session('cart', []);
        $products = \App\Models\Product::find(array_keys($cart));
    @endphp

    @foreach ($products as $product)
        <div class="flex justify-between border-b py-4">

            <div>
                <h2 class="font-semibold">{{ $product->name }}</h2>
                <p>${{ $product->price }}</p>
            </div>

            <div>
                Qty: {{ $cart[$product->id] }}
            </div>

        </div>
    @endforeach

    <a href="/checkout"
       class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded">
        Checkout
    </a>

</div>
