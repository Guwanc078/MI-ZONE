<!DOCTYPE html>
<html>
<head>
    <title>Mi Zone</title>
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
                    <a href="/" class="text-red-600 font-bold">Home Page</a>
                    <a href="/urunler" class="text-gray-700 hover:text-red-600">Products</a>
                    <a href="/sepet" class="text-gray-700 hover:text-red-600">
                        <i class="fas fa-shopping-cart"></i> Sebet
                    </a>
                    <a href="/admin" class="text-gray-700 hover:text-red-600">
                        <i class="fas fa-user-shield"></i> Admins
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome To Mi Zone</h1>
            <p class="text-gray-600 text-lg">Xiaomi, Redmi, POCO ve daha fazlası</p>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <a href="/urunler?category=telefonlar" class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                    <div class="text-3xl text-blue-600 mb-3">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="font-bold">Telefonlar</h3>
                </a>
                
                <a href="/urunler?category=akilli-saatler" class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                    <div class="text-3xl text-green-600 mb-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="font-bold">Watch Series</h3>
                </a>
                
                <a href="/urunler?category=kulakliklar" class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                    <div class="text-3xl text-red-600 mb-3">
                        <i class="fas fa-headphones"></i>
                    </div>
                    <h3 class="font-bold">Airpods</h3>
                </a>
                
                <a href="/urunler?category=tabletler" class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                    <div class="text-3xl text-purple-600 mb-3">
                        <i class="fas fa-tablet-alt"></i>
                    </div>
                    <h3 class="font-bold">Tabs</h3>
                </a>
                
                <a href="/urunler?category=aksesuarlar" class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
                    <div class="text-3xl text-yellow-600 mb-3">
                        <i class="fas fa-box"></i>
                    </div>
                    <h3 class="font-bold">-</h3>
                </a>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Sponsored Marka</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl text-red-600 mb-3">
                        <i class="fab fa-xbox"></i>
                    </div>
                    <h3 class="font-bold">Xiaomi</h3>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl text-orange-600 mb-3">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3 class="font-bold">Redmi</h3>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl text-blue-600 mb-3">
                        <i class="fas fa-headphones"></i>
                    </div>
                    <h3 class="font-bold">Baseus</h3>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl text-green-600 mb-3">
                        <i class="fas fa-volume-up"></i>
                    </div>
                    <h3 class="font-bold">JBL</h3>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl text-gray-600 mb-3">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="font-bold">POCO</h3>
                </div>
            </div>
        </div>

        @php
            
            $demoProducts = [
                (object)[
                    'id' => 1,
                    'name' => 'Xiaomi 14 Pro',
                    'model' => '16GB/512GB',
                    'price' => '34000',
                    'stock' => 5,
                    'brand' => (object)['name' => 'Xiaomi']
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Redmi Note 13',
                    'model' => '8GB/256GB',
                    'price' => '12000',
                    'stock' => 25,
                    'brand' => (object)['name' => 'Redmi']
                ],
                (object)[
                    'id' => 3,
                    'name' => 'POCO F5',
                    'model' => '12GB/256GB',
                    'price' => '15000',
                    'stock' => 15,
                    'brand' => (object)['name' => 'POCO']
                ],
                (object)[
                    'id' => 4,
                    'name' => 'Mi Band 8',
                    'model' => 'Aktiviteli',
                    'price' => '20000',
                    'stock' => 50,
                    'brand' => (object)['name' => 'Xiaomi']
                ],
            ];
            
            // Eğer gerçek ürünler geliyorsa onları kullan, yoksa demoyu kullan
            $featuredProducts = isset($featuredProducts) && count($featuredProducts) > 0 ? $featuredProducts : $demoProducts;
        @endphp

        <div>
            <h2 class="text-2xl font-bold mb-6 text-center">Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-xl shadow overflow-hidden hover:shadow-xl transition">
                    <div class="p-4">
                        <div class="text-center mb-4">
                            <div class="text-4xl text-gray-300 mb-2">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $product->model }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-2xl font-bold text-red-600">{{ number_format($product->price, 0, ',', '.') }} TMT</span>
                        </div>
                        
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                            </span>
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                {{ $product->brand->name ?? 'Marka' }}
                            </span>
                        </div>
                        
                        <div class="flex space-x-2">
                            <a href="/urun/{{ $product->id }}" class="flex-1 bg-gray-100 text-gray-800 py-2 rounded text-center hover:bg-gray-200 transition">
                                Vievs
                            </a>
                            <form action="/sepet/ekle/{{ $product->id }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $product->stock == 0 ? 'disabled' : '' }}>
                                    Sebet
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center space-x-4 mb-6">
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Xiaomi</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Redmi</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">Baseus</span>
                <span class="bg-white text-black px-4 py-2 rounded font-bold">JBL</span>
            </div>
            <p class="text-gray-400">© 2026 Mi Zone</p>
            <p class="text-gray-500 text-sm mt-2">Asgabat / Turkmenistan</p>
        </div>
    </footer>
</body>
</html>
