<!DOCTYPE html>
<html lang="tr">
<head>
@extends('layouts.app')
    <style>
        body{background:#f8f9fa}
        .card{border:none;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.1)}
        .card-header{background:linear-gradient(45deg,#28a745,#20c997);color:white}
        .form-control,.form-select{border-radius:10px;padding:12px;border:2px solid #e0e6ed}
        .form-control:focus,.form-select:focus{border-color:#28a745;box-shadow:0 0 0 3px rgba(40,167,69,0.2)}
        .btn-primary{background:linear-gradient(45deg,#28a745,#20c997);border:none;padding:12px 30px;border-radius:10px}
        .btn-secondary{background:#6c757d;border:none;padding:12px 30px;border-radius:10px}
        .image-preview{width:100%;height:200px;border-radius:10px;border:2px solid #ddd;background:#f8f9fa;overflow:hidden}
        .image-preview img{max-width:100%;max-height:100%;object-fit:contain}
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-mobile-alt me-2"></i>MiZone</a>
            <a href="/logout" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Update Products</h3>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            <div><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</div>
                            @endforeach
                        </div>
                        @endif

                        <form action="/urun-duzenle/{{ $urun->id }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" required 
                                           value="{{ old('name', $urun->name) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Models:</label>
                                    <input type="text" class="form-control" name="model" required 
                                           value="{{ old('model', $urun->model) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Categories</label>
                                    <select class="form-select" name="category_id" required>
                                        <option value="">Catrgori sec</option>
                                        @foreach($kategoriler as $kategori)
                                        <option value="{{ $kategori->id }}" 
                                                {{ (old('category_id', $urun->category_id) == $kategori->id) ? 'selected' : '' }}>
                                            {{ $kategori->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Marka</label>
                                    <input type="text" class="form-control" name="brand" required 
                                           value="{{ old('brand', $urun->brand) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" required 
                                           step="0.01" min="0" value="{{ old('price', $urun->price) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock" required 
                                           min="0" value="{{ old('stock', $urun->stock) }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo URL</label>
                                <input type="url" class="form-control" id="imageUrl" name="image" required 
                                       value="{{ old('image', $urun->image) }}"
                                       onchange="updateImagePreview()">
                                <div id="imagePreview" class="image-preview mt-2">
                                    <img src="{{ $urun->image }}" alt="Photo IMG">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">BIO</label>
                                <textarea class="form-control" name="description" rows="3">{{ old('description', $urun->description) }}</textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="/urunler" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateImagePreview() {
            const url = document.getElementById('imageUrl').value;
            const preview = document.getElementById('imagePreview');
            
            if (url) {
                preview.innerHTML = <img src="${url}" alt="Ürün Görseli">;
            }
        }
    </script>
</body>
</html>