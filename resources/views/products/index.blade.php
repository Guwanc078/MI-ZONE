<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-2xl font-bold text-red-600">
                    <i class="fas fa-bolt"></i> Mi Zone
                </a>
                <div class="flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-red-600">Ana Sayfa</a>
                    <a href="/urunler" class="text-red-600 font-bold">Ürünler</a>
                    <a href="/sepet" class="text-gray-700 hover:text-red-600">
                        <i class="fas fa-shopping-cart"></i> Sepet
                    </a>
                    <a href="/admin" class="text-gray-700 hover:text-red-600">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Xiaomi Ürünleri</h1>
                <p class="text-gray-600 mt-2">{{ $products->total() }} ürün listeleniyor</p>
            </div>
            <div class="flex items-center space-x-4">
                <select class="border border-gray-300 rounded-lg px-4 py-2">
                    <option>Sırala</option>
                    <option>Fiyat: Düşükten Yükseğe</option>
                    <option>Fiyat: Yüksekten Düşüğe</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="p-6">
                    <div class="text-center mb-4">
                        <div class="text-5xl text-gray-200 mb-3">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="flex justify-center space-x-2 mb-2">
                            @if($product->brand)
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $product->brand->name }}</span>
                            @endif
                            @if($product->is_featured)
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Öne Çıkan</span>
                            @endif
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $product->model }}</p>
                    </div>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>

                    <div class="mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">{{ number_format($product->price, 0) }} TMT</span>
                            @if($product->old_price)
                            <span class="text-gray-400 line-through text-sm">{{ number_format($product->old_price, 0) }} TMT</span>
                            @endif
                        </div>
                        <div class="mt-2 flex items-center">
                            <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                {{ $product->stock > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                            </span>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <a href="/urun/{{ $product->id }}" class="flex-1 bg-gray-100 text-gray-800 font-medium py-2 rounded-lg text-center hover:bg-gray-200 transition">
                            <i class="fas fa-eye mr-1"></i> İncele
                        </a>
                        <form action="/sepet/ekle/{{ $product->id }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-red-600 text-white font-medium py-2 rounded-lg hover:bg-red-700 transition {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-cart-plus mr-1"></i> Sepete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($products->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="bg-white px-4 py-3 rounded-lg shadow-md">
                {{ $products->links() }}
            </div>
        </div>
        @endif
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center space-x-8 mb-4">
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Xiaomi</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Redmi</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">POCO</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Baseus</span>
            </div>
            <p class="text-gray-400">© 2024 Mi Zone. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>