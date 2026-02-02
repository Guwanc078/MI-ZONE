<!DOCTYPE html>
<html>
@extends('layouts.app')
<body class="bg-gray-100">
<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-red-600">
            <i class="fas fa-bolt"></i> Mi Zone
        </a>
        <div class="flex items-center space-x-6">
            <a href="/" class="text-gray-700 hover:text-red-600">Home Page</a>
            <a href="/urunler" class="text-gray-700 hover:text-red-600">Products</a>
            <a href="/sepet" class="text-red-600 font-bold">
                <i class="fas fa-shopping-cart"></i> Sebet ({{ $toplamUrun ?? 0 }})
            </a>
        </div>
    </div>
</nav>

<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">All Oders</h1>
    
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif
    
    @if(count($sepetUrunleri ?? []) > 0)
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-gray-700 font-bold">Products</th>
                        <th class="px-6 py-4 text-left text-gray-700 font-bold">Price</th>
                        <th class="px-6 py-4 text-left text-gray-700 font-bold">Stoc</th>
                        <th class="px-6 py-4 text-left text-gray-700 font-bold">Total</th>
                        <th class="px-6 py-4 text-left text-gray-700 font-bold">Delete/</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sepetUrunleri as $item)
                    @php
                        $urun = $item['urun'];
                        $adet = $item['adet'] ?? 1; // Eğer 'miktar' yoksa varsayılan 1
                        $toplamUrun = $urun->price * $adet;
                    @endphp
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="text-3xl text-gray-300 mr-4">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold">{{ $urun->name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $urun->model }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-red-600">{{ number_format($urun->price, 0, '', '.') }} TMT</span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/sepet/guncelle/{{ $urun->id }}" method="POST" class="flex items-center">
                                @csrf
                                <input type="number" name="miktar" value="{{ $adet }}" min="1" class="w-20 p-2 border rounded text-center">
                                <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold">{{ number_format($toplamUrun, 0, '', '.') }} TMT</span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/sepet/sil/{{ $urun->id }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i> Sil
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-6 bg-gray-50 border-t">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold">Total: <span class="text-red-600">{{ number_format($total, 0, '', '.') }} TMT</span></h3>
                    <p class="text-gray-600 text-sm">{{ count($sepetUrunleri) }} ürün</p>
                </div>
                <div class="flex space-x-4">
                    <form action="/sepet/temizle" method="POST">
                        @csrf
                        <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">
                            <i class="fas fa-trash mr-2"></i> Delete
                        </button>
                    </form>
                    <a href="/urunler" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>Go Shopping
                    </a>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                        <i class="fas fa-credit-card mr-2"></i>Orders Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="bg-white rounded-xl shadow p-12 text-center">
        <div class="text-6xl text-gray-300 mb-6">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-600 mb-4">Sebet Boş</h3>
        <p class="text-gray-500 mb-8">Sebet No Orders.</p>
        <a href="/urunler" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg text-lg font-bold">
            <i class="fas fa-shopping-bag mr-2"></i>Start Shopping
        </a>
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
        <p class="text-gray-400">© 2026 Mi Zone</p>
        <p class="text-gray-500 text-sm mt-2">Ashgabat / Turkmenistan</p>
    </div>
</footer>
</body>
</html>