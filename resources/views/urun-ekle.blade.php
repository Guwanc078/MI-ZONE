<!DOCTYPE html>
<html>
<head>
    <title>Ürün Ekle - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/admin" class="text-2xl text-red-600 mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-xl font-bold text-gray-800">Add</h1>
        </div>
        <a href="/admin" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
            Guwanc Admin Panel
        </a>
    </div>
</nav>

<div class="container mx-auto px-6 py-8 max-w-2xl">
    <div class="bg-white rounded-xl shadow p-6">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        
        <form method="POST" action="/urun-ekle" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="Xiaomi 14 Pro" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Storage</label>
                <input type="text" name="model" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="16GB/512GB">
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                <select name="category" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" required>
                    <option value="">Kategori Sec</option>
                    <option value="telefonlar">Phones</option>
                    <option value="akilli-saatler">Watches</option>
                    <option value="kulakliklar">Airpods</option>
                    <option value="tabletler">Pads</option>
                    <option value="aksesuarlar">-</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Marka</label>
                <select name="brand" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" required>
                    <option value="">Marka</option>
                    <option value="xiaomi">Xiaomi</option>
                    <option value="redmi">Redmi</option>
                    <option value="poco">POCO</option>
                    <option value="baseus">Baseus</option>
                    <option value="jbl">JBL</option>
                    <option value="apple">Apple</option>
                    <option value="samsung">Samsung</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Price (TMT)</label>
                <input type="number" name="price" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="34999" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                <input type="number" name="stock" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="50" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">BIO</label>
                <textarea name="description" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                          placeholder="Ürün açıklaması..."></textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">PHOTO URL</label>
                <input type="text" name="image" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="https://example.com/resim.jpg">
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg transition">
                    <i class="fas fa-save mr-2"></i>Save
                </button>
                <a href="/admin" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-4 rounded-lg text-center transition">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>