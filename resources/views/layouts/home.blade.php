@extends('layouts.app')

@section('content')
<div class="mb-8">
    <div class="bg-gradient-to-r from-red-600 to-orange-500 text-white p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-4">Mi Zone'a Hoş Geldiniz!</h1>
        <p class="text-xl">Xiaomi, Redmi, POCO ve sponsor markaların en yeni ürünleri burada</p>
    </div>
</div>

@if($sponsorBrands->count() > 0)
<div class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Sponsor Markalarımız</h2>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach($sponsorBrands as $brand)
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <div class="text-3xl mb-2">
                @if($brand->name == 'Xiaomi')
                <i class="fab fa-xbox text-red-600"></i>
                @elseif($brand->name == 'JBL')
                <i class="fas fa-volume-up text-orange-600"></i>
                @else
                <i class="fas fa-tag text-blue-600"></i>
                @endif
            </div>
            <h3 class="font-bold">{{ $brand->name }}</h3>
        </div>
        @endforeach
    </div>
</div>
@endif

@if($featuredProducts->count() > 0)
<div class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Öne Çıkan Ürünler</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach($featuredProducts as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-4">
                <div class="text-center mb-4">
                    <div class="text-4xl mb-2">
                        <i class="fas fa-mobile-alt text-gray-600"></i>
                    </div>
                    <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $product->brand->name }} {{ $product->model }}</p>
                </div>
                <div class="mb-4">
                    <span class="text-2xl font-bold text-red-600">{{ number_format($product->price, 2) }} TMT</span>
                    @if($product->old_price)
                    <span class="text-gray-500 line-through ml-2">{{ number_format($product->old_price, 2) }} TMT</span>
                    @endif
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                        {{ $product->stock > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                    </span>
                    <a href="{{ route('products.show', $product->slug) }}" 
                       class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">
                        İncele
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Kategoriler</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($categories as $category)
        <a href="{{ route('products.index') }}?category={{ $category->id }}" 
           class="bg-white p-4 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
            <div class="text-2xl mb-2">
                @if($category->icon == 'phone')
                <i class="fas fa-mobile-alt text-blue-600"></i>
                @elseif($category->icon == 'tablet')
                <i class="fas fa-tablet-alt text-green-600"></i>
                @elseif($category->icon == 'watch')
                <i class="fas fa-clock text-purple-600"></i>
                @elseif($category->icon == 'headphones')
                <i class="fas fa-headphones text-red-600"></i>
                @else
                <i class="fas fa-box text-gray-600"></i>
                @endif
            </div>
            <h3 class="font-bold">{{ $category->name }}</h3>
            <p class="text-sm text-gray-600">{{ $category->products_count }} ürün</p>
        </a>
        @endforeach
    </div>
</div>
@endsection