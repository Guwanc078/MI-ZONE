<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Düzenle - MiZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body{background:#f8f9fa}
        .card{border:none;border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,0.1)}
        .card-header{background:linear-gradient(45deg,#28a745,#20c997);color:white;border-radius:15px 15px 0 0 !important}
        .form-control,.form-select{border-radius:10px;padding:12px;border:2px solid #e0e6ed}
        .form-control:focus,.form-select:focus{border-color:#28a745;box-shadow:0 0 0 3px rgba(40,167,69,0.2)}
        .btn-primary{background:linear-gradient(45deg,#28a745,#20c997);border:none;padding:12px 30px;border-radius:10px}
        .btn-primary:hover{background:linear-gradient(45deg,#218838,#1a8c7a)}
        .btn-secondary{background:#6c757d;border:none;padding:12px 30px;border-radius:10px}
        .image-preview{width:100%;height:200px;border-radius:10px;border:2px solid #ddd;background:#f8f9fa;overflow:hidden;display:flex;align-items:center;justify-content:center}
        .image-preview img{max-width:100%;max-height:100%;object-fit:contain}
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-mobile-alt me-2"></i>MiZone</a>
            <div>
                <span class="text-white me-3"><i class="fas fa-user me-2"></i>Admin</span>
                <a href="/logout" class="btn btn-outline-light btn-sm"><i class="fas fa-sign-out-alt me-2"></i>Çıkış</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center py-3">
                        <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Ürün Düzenle</h3>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong><i class="fas fa-exclamation-triangle me-2"></i>Hatalar:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                <li><i class="fas fa-times me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form action="/urun-duzenle/{{ $urun->id }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Ürün Adı</label>
                                    <input type="text" class="form-control" name="name" required 
                                           value="{{ old('name', $urun->name) }}" placeholder="Ürün adını girin">
                                </div>
<div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Model</label>
                                    <input type="text" class="form-control" name="model" required 
                                           value="{{ old('model', $urun->model) }}" placeholder="Model girin">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kategori</label>
                                    <select class="form-select" name="category_id" required>
                                        <option value="">Kategori Seçin</option>
                                        @foreach($kategoriler as $kategori)
                                        <option value="{{ $kategori->id }}" 
                                                {{ (old('category_id', $urun->category_id) == $kategori->id) ? 'selected' : '' }}>
                                            {{ $kategori->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Marka</label>
                                    <input type="text" class="form-control" name="brand" required 
                                           value="{{ old('brand', $urun->brand) }}" placeholder="Marka girin">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Fiyat</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₺</span>
                                        <input type="number" class="form-control" name="price" required 
                                               step="0.01" min="0" value="{{ old('price', $urun->price) }}" placeholder="0.00">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Stok</label>
                                    <input type="number" class="form-control" name="stock" required 
                                           min="0" value="{{ old('stock', $urun->stock) }}" placeholder="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Fotoğraf URL</label>
                                <input type="url" class="form-control" id="imageUrl" name="image" required 
                                       value="{{ old('image', $urun->image) }}"
                                       oninput="updateImagePreview()" placeholder="https://...">
                                <div class="image-preview mt-3" id="imagePreview">
                                    @if($urun->image)
                                        <img src="{{ $urun->image }}" alt="Ürün Görseli" id="previewImg">
                                    @else
                                        <div class="text-muted">Fotoğraf önizlemesi</div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3"><label class="form-label fw-bold">Açıklama</label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Ürün açıklaması...">{{ old('description', $urun->description) }}</textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="/urunler" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>İptal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Güncelle
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function updateImagePreview() {
        const url = document.getElementById('imageUrl').value;
        const preview = document.getElementById('imagePreview');
        
        if (url) {
            preview.innerHTML = '<img src="' + url + '" alt="Ürün Görseli" style="max-width:100%; max-height:100%; object-fit:contain">';
        } else {
            preview.innerHTML = '<div class="text-muted">Fotoğraf önizlemesi</div>';
        }
    }
</script>
</body>
</html>