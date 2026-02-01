<!DOCTYPE html>
<html>
<head>
    <title>Ürün Detay - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-red-600">
                <i class="fas fa-bolt"></i> Mi Zone
            </a>
            <div class="flex items-center space-x-6">
                <a href="/" class="text-gray-700 hover:text-red-600">Ana Sayfa</a>
                <a href="/urunler" class="text-gray-700 hover:text-red-600">Ürünler</a>
                <a href="/sepet" class="text-gray-700 hover:text-red-600">
                    <i class="fas fa-shopping-cart"></i> Sepet
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto px-6 py-8">
    @php
        $urunler = [
            1 => [
                'id' => 1,
                'name' => 'Xiaomi 14 Pro',
                'model' => '16GB/512GB',
                'price' => '34.999',
                'stock' => 15,
                'brand' => 'Xiaomi',
                'category' => 'telefonlar',
                'description' => 'Xiaomi 14 Pro, en yeni Snapdragon 8 Gen 3 işlemcisi ile geliyor. 6.73" LTPO AMOLED ekran, 120Hz yenileme hızı, 50MP üçlü kamera sistemi ve 4880mAh batarya.',
                'specs' => [
                    'Ekran' => '6.73" LTPO AMOLED, 120Hz',
                    'İşlemci' => 'Snapdragon 8 Gen 3',
                    'RAM' => '16GB LPDDR5X',
                    'Depolama' => '512GB UFS 4.0',
                    'Kamera' => '50MP Ana + 50MP Ultra Geniş + 50MP Tele',
                    'Batarya' => '4880mAh, 120W hızlı şarj',
                    'İşletim Sistemi' => 'Android 14, HyperOS'
                ],
                'images' => ['fas fa-mobile-alt text-blue-600 text-8xl']
            ],
            2 => [
                'id' => 2,
                'name' => 'Redmi Note 13 Pro',
                'model' => '12GB/256GB',
                'price' => '18.499',
                'stock' => 25,
                'brand' => 'Redmi',
                'category' => 'telefonlar',
                'description' => 'Redmi Note 13 Pro, 200MP kamerası ve güçlü performansı ile orta segmentin lideri.',
                'specs' => [
                    'Ekran' => '6.67" AMOLED, 120Hz',
                    'İşlemci' => 'Snapdragon 7s Gen 2',
                    'RAM' => '12GB',
                    'Depolama' => '256GB',
                    'Kamera' => '200MP Ana + 8MP Ultra Geniş + 2MP Macro',
                    'Batarya' => '5100mAh, 67W hızlı şarj'
                ],
                'images' => ['fas fa-mobile-alt text-orange-600 text-8xl']
            ]
        ];
        
        $urun = $urunler[$id] ?? $urunler[1];
    @endphp

    <a href="/urunler" class="inline-flex items-center text-red-600 hover:text-red-700 mb-6">
        <i class="fas fa-arrow-left mr-2"></i> Ürünlere Dön
    </a>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Sol Taraf - Resim -->
            <div class="md:w-1/3 p-8 flex items-center justify-center bg-gray-50">
                <div class="{{ $urun['images'][0] }}"></div>
            </div>
            
            <!-- Sağ Taraf - Bilgiler -->
            <div class="md:w-2/3 p-8">
                <div class="mb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">{{ $urun['name'] }}</h1>
                            <p class="text-gray-600 text-lg">{{ $urun['model'] }}</p>
                        </div>
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-bold">
                            {{ $urun['brand'] }}
                        </span>
                    </div>
                    
                    <div class="mt-4">
                        <span class="text-4xl font-bold text-red-600">{{ $urun['price'] }} TMT</span>
                        <span class="ml-4 text-sm {{ $urun['stock'] > 0 ? 'text-green-600' : 'text-red-600' }}">
                            <i class="fas {{ $urun['stock'] > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                            {{ $urun['stock'] > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                        </span>
                    </div>
                </div>
                
                <!-- Ürün Açıklama -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Ürün Açıklaması</h3>
                    <p class="text-gray-600">{{ $urun['description'] }}</p>
                </div>
                
                <!-- Teknik Özellikler -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Teknik Özellikler</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($urun['specs'] as $key => $value)
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">{{ $key }}:</span>
                            <span class="font-medium">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Sepete Ekleme -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <form action="/sepet/ekle/{{ $urun['id'] }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="flex items-center space-x-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Adet:</label>
                                <input type="number" name="quantity" value="1" min="1" max="{{ $urun['stock'] }}" 
                                       class="w-24 p-3 border border-gray-300 rounded-lg text-center">
                            </div>
                            
                            <div class="flex-1">
                                <button type="submit" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 {{ $urun['stock'] == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                        {{ $urun['stock'] == 0 ? 'disabled' : '' }}>
                                    <i class="fas fa-cart-plus mr-2"></i>
                                    {{ $urun['stock'] > 0 ? 'Sepete Ekle' : 'Stokta Yok' }}
                                </button>
                            </div>
                        </div>
                        
                        @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-6 text-center">
        <div class="flex justify-center space-x-4 mb-6">
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Xiaomi</span>
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Redmi</span>
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Baseus</span>
            <span class="bg-white text-black px-2 py-2 rounded font-bold">JBL</span>
        </div>
        <p class="text-gray-400">© 2024 Mi Zone - Tüm hakları saklıdır</p>
        <p class="text-gray-500 text-sm mt-2">İstanbul / Türkiye</p>
    </div>
</footer>
</body>
</html>
