<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Example View</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Migrated Products</h1>
            <p class="mt-2 text-sm text-gray-600">This view was created to demonstrate the data you just migrated and seeded from the database structure.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-1" title="{{ $product->name }}">{{ $product->name }}</h3>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 line-clamp-2" title="{{ $product->description }}">{{ $product->description }}</p>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                            <span class="text-xs text-gray-500">Stock: {{ $product->quantity }}</span>
                        </div>
                    </div>
                    <div class="px-5 py-3 bg-gray-50 border-t border-gray-200 text-xs text-gray-500">
                        Vendor: <span class="font-semibold text-gray-700">{{ $product->vendor ? $product->vendor->name : 'N/A' }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-white rounded-lg border border-gray-200">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No products found</h3>
                    <p class="mt-1 text-sm text-gray-500">If you just migrated, don't forget to run <code class="bg-gray-100 px-1 rounded">php artisan db:seed</code></p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
        
        <div class="mt-12 text-center">
            <a href="/" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">&larr; Back to Laravel Welcome</a>
        </div>
    </div>
</body>
</html>
