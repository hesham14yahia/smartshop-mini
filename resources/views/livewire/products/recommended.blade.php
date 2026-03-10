<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-8">
        Products Recommended for you
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
                <img src="{{ 'https://placehold.co/600x300' }}" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="font-semibold text-lg">
                    {{ $product->name }}
                </h3>
                <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                    {{ $product->description }}
                </p>
                <div class="flex justify-between items-center mt-4">
                    <span class="font-bold text-lg">
                        ${{ $product->price }}
                    </span>
                    <a href="{{ route('products.show', $product) }}" class="text-sm text-blue-600 hover:underline">
                        View
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
