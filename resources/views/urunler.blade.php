<!DOCTYPE html>
<html lang="tr">
<head>
@extends('layouts.app')
    <style>
        body{background:#f8f9fa}
        .card{border:none;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,0.08);transition:transform 0.3s}
        .card:hover{transform:translateY(-5px)}
        .card-img-top{height:200px;object-fit:contain;padding:20px;background:#fff}
        .category-badge{background:linear-gradient(45deg,#667eea,#764ba2);color:white;padding:5px 15px;border-radius:20px;font-size:12px}
        .price{color:#28a745;font-weight:bold;font-size:20px}
        .stock-badge{padding:5px 10px;border-radius:10px;font-size:12px}
        .stock-in{background:#d4edda;color:#155724}
        .stock-out{background:#f8d7da;color:#721c24}
        .btn-action{width:40px;height:40px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center}
        .search-box{max-width:500px}
    </style>
</head>
<body>
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-2xl font-bold text-red-600">
                    <i class="fas fa-bolt"></i> Mi Zone
                </a>
                <div class="flex items-center space-x-6">
                    <a href="/urunler" class="text-red-600 font-bold">Products</a>
                    <a href="/" class="text-gray-700 hover:text-red-600">Home Page</a>
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

    <div class="container mt-4">
        <h1 class="mb-4">
            <i class="fas fa-boxes me-2"></i>
            {{ $kategoriAdi ?? 'All Products' }}
        </h1>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-8">
                <form action="/urunler" method="GET" class="d-flex search-box">
                    <input type="text" name="search" class="form-control" placeholder="Search..." 
                           value="{{ $searchTerm ?? '' }}">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/urunler" method="GET" id="categoryForm">
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($kategoriler as $kategori)
                        <option value="{{ $kategori->id }}" 
                                {{ (isset($selectedCategory) && $selectedCategory == $kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row" id="productsContainer">
            @foreach($urunler as $urun)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $urun->image }}" class="card-img-top" alt="{{ $urun->name }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            @if($urun->category)
                            <span class="category-badge">{{ $urun->category->name }}</span>
                            @endif
                            <span class="stock-badge {{ $urun->stock > 0 ? 'stock-in' : 'stock-out' }}">
                                {{ $urun->stock > 0 ? 'Stokta: '.$urun->stock : '' }}
                            </span>
                        </div>
                        <h6 class="card-title">{{ $urun->name }}</h6>
                        <p class="text-muted small mb-2">{{ $urun->model }} | {{ $urun->brand }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">TMT {{ number_format($urun->price, 2) }}</span>
                            <div>
                                <a href="/urun-duzenle/{{ $urun->id }}" class="btn-action btn-warning me-1" title="Update">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/urun-sil/{{ $urun->id }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Deleted?')">
                                    @csrf
                                    <button type="submit" class="btn-action btn-danger" title="Sil">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="/urun/{{ $urun->id }}" class="btn-action btn-info ms-1" title="Detay">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($urunler->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
            <h4>Now Product</h4>
            <p class="text-muted">Add Products ----.</p>
            <a href="/urun-ekle" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Products</a>
        </div>
        @endif
    </div>
</body>
</html>