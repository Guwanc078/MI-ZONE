<!DOCTYPE html>
<html>
@extends('layouts.app')
<body class="bg-gray-100">
<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/admin" class="text-2xl text-red-600 mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-xl font-bold text-gray-800">Categories</h1>
        </div>
        <a href="/admin" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
           Guwanc Admin Panel
        </a>
    </div>
</nav>

<div class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(['Phones', 'Watch-Series', 'Airpods', 'Tabs', 'Acsesuaries'] as $category)
        <div class="bg-white rounded-xl shadow overflow-hidden hover:shadow-xl transition">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    @php
                        $icons = [
                            'Phones' => 'fas fa-mobile-alt text-blue-600',
                            'Watch-Series' => 'fas fa-clock text-green-600',
                            'Airpods' => 'fas fa-headphones text-red-600',
                            'Tabs' => 'fas fa-tablet-alt text-purple-600',
                            'Acsesuaries' => 'fas fa-box text-yellow-600'
                        ];
                    @endphp
                    <div class="text-3xl {{ $icons[$category] }} mr-4"></div>
                    <div>
                        <h3 class="font-bold text-lg">{{ ucfirst(str_replace('-', ' ', $category)) }}</h3>
                        <p class="text-gray-500 text-sm">0 products</p>
                    </div>
                </div>
                
                <div class="flex space-x-2">
                    <a href="/urunler/{{ $category }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded">
                        <i class="fas fa-eye mr-2"></i>Viev
                    </a>
                    <a href="/urun-ekle?category={{ $category }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded">
                        <i class="fas fa-plus mr-2"></i>Add Products
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
