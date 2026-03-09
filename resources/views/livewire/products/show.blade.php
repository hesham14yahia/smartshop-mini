<div class="max-w-6xl mx-auto px-6 py-12">

    <div class="grid md:grid-cols-2 gap-10">

        <img
            src="{{ 'https://placehold.co/600x300' }}"
            class="w-full rounded-xl mb-4"
        >

        <div>

            <h1 class="text-3xl font-bold mb-4">
                {{ $product->name }}
            </h1>

            <p class="text-gray-600 mb-6">
                {{ $product->description }}
            </p>

            <div class="text-2xl font-bold mb-6">
                ${{ $product->price }}
            </div>

            <button
                wire:click="addToCart"
                class="bg-black text-white px-6 py-3 rounded-lg"
            >
                Add to Cart
            </button>

        </div>

    </div>

</div>
