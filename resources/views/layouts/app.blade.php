<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Zone - Xiaomi Resmi Mağaza</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-red-600">
                        <i class="fas fa-bolt"></i> Mi Zone
                    </a>
                    <div class="ml-10 space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600">Ana Sayfa</a>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600">Ürünler</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">Kampanyalar</a>
                        <a href="#" class="text-gray-700 hover:text-red-600">Destek</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-red-600">
                        <i class="fas fa-shopping-cart"></i>
                        Sepet
                        @if(session()->has('cart_count'))
                            <span class="bg-red-600 text-white rounded-full px-2 py-1 text-xs">
                                {{ session('cart_count') }}
                            </span>
                        @endif
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-red-600">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Mi Zone</h3>
                    <p>Xiaomi Türkiye Resmi Distribütörü</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Hızlı Linkler</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-red-400">Hakkımızda</a></li>
                        <li><a href="#" class="hover:text-red-400">İletişim</a></li>
                        <li><a href="#" class="hover:text-red-400">Garanti Koşulları</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Sponsor Markalar</h4>
                    <div class="flex space-x-4">
                        <span class="bg-white text-black px-3 py-1 rounded">Xiaomi</span>
                        <span class="bg-white text-black px-3 py-1 rounded">Baseus</span>
                        <span class="bg-white text-black px-3 py-1 rounded">JBL</span>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-4">İletişim</h4>
                    <p><i class="fas fa-phone mr-2"></i> 0850 123 4567</p>
                    <p><i class="fas fa-envelope mr-2"></i> info@mizone.com</p>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>