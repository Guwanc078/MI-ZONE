<!DOCTYPE html>
<html>
<head>
    <title>Ürünler - Mi Zone</title>
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
                <a href="/" class="text-gray-700 hover:text-red-600">Home Page</a>
                <a href="/urunler" class="text-red-600 font-bold">Producst</a>
                <a href="/sepet" class="text-gray-700 hover:text-red-600">
                    <i class="fas fa-shopping-cart"></i> Sebet
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">All Product Vievs</h1>
        <p class="text-gray-600">Toplam {{ $urunler->count() }} Product</p>
    </div>

    @if($urunler->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach($urunler as $urun)
        <div class="bg-white rounded-xl shadow overflow-hidden hover:shadow-xl transition">
            <div class="p-4">
                <div class="text-center mb-4">
                    <div class="text-4xl mb-2 {!! $urun->category_icon !!}"></div>
                    <h3 class="font-bold text-lg">{{ $urun->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $urun->model }}</p>
                </div>
                
                <div class="mb-4">
                    <span class="text-2xl font-bold text-red-600">{{ $urun->price_formatted }} TMT</span>
                </div>
                
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm {{ $urun->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $urun->stock > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                    </span>
                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">
                        {{ $urun->brand }}
                    </span>
                </div>
                
                <div class="flex space-x-2">
                    <a href="/urun/{{ $urun->id }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded text-center transition">
                        <i class="fas fa-eye mr-1"></i> BIO
                    </a>
                    <form action="/sepet/ekle/{{ $urun->id }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded transition {{ $urun->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $urun->stock == 0 ? 'disabled' : '' }}>
                            <i class="fas fa-cart-plus mr-1"></i> Sebet
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-xl shadow p-12 text-center">
        <div class="text-6xl text-gray-300 mb-6">
            <i class="fas fa-box-open"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-600 mb-4">Tapylmady</h3>
        <p class="text-gray-500 mb-8">Now Products.</p>
        @auth
        <a href="/urun-ekle" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg text-lg font-bold">
            <i class="fas fa-plus mr-2"></i>Add Products
        </a>
        @endauth
    </div>
    @endif
</div>

<footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-6 text-center">
        <div class="flex justify-center space-x-4 mb-6">
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Xiaomi</span>
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Redmi</span>
            <span class="bg-white text-black px-4 py-2 rounded font-bold">Baseus</span>
            <span class="bg-white text-black px-4 py-2 rounded font-bold">JBL</span>
        </div>
        <p class="text-gray-400">© 2026 Mi Zone - TURKMENISTAN</p>
        <p class="text-gray-500 text-sm mt-2">Ashgabat / Turkmenistan</p>
    </div>
</footer>
</body>
</html>
