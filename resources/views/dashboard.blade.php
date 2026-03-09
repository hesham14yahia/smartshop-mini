<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="bg-gray-50">
                        <div class="max-w-7xl mx-auto px-6 py-20 text-center">

                            <h1 class="text-5xl font-bold text-gray-900 mb-6">
                                Discover Products You'll Love
                            </h1>

                            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                                SmartShop Mini uses AI to recommend products based on what you view,
                                helping you find the perfect items faster.
                            </p>

                            <div class="flex justify-center gap-4">
                                <a href="{{ route('products.index') }}" class="text-white bg-black px-6 py-3 rounded-lg hover:bg-gray-800">
                                    Browse Products
                                </a>

                                <a href="{{ route('products.recommended') }}"
                                    class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
                                    See Recommendations
                                </a>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
