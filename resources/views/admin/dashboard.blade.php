<!DOCTYPE html>
<html>
<head>
    <title>Admin - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <div class="text-2xl text-red-600 mr-3">
                <i class="fas fa-user-shield"></i>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Mi Zone Admin</h1>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700">Welcome, <strong>{{ Auth::user()->name }}</strong></span>
            <a href="/logout" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                <i class="fas fa-sign-out-alt mr-2"></i>Exit
            </a>
        </div>
    </div>
</nav>

<div class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center">
                <div class="text-3xl text-blue-600 mr-4">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Total Products</h3>
                    <p class="text-3xl font-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center">
                <div class="text-3xl text-green-600 mr-4">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm">Total Users or Admins</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center">
                <div class="text-3xl text-yellow-600 mr-4">
                    <i class="fas fa-shopping-cart">Orders</i>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm"></h3>
                    <p class="text-3xl font-bold">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Dowam Et</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="/urun-ekle" class="bg-red-600 hover:bg-red-700 text-white p-4 rounded-lg text-center transition">
                <i class="fas fa-plus text-2xl mb-2"></i>
                <p class="font-bold">Add Products</p>
            </a>
            
            <a href="/kategoriler" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-lg text-center transition">
                <i class="fas fa-tags text-2xl mb-2"></i>
                <p class="font-bold">Categories</p>
            </a>
            
            <a href="/urunler" class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-lg text-center transition">
                <i class="fas fa-list text-2xl mb-2"></i>
                <p class="font-bold">Products List</p>
            </a>
            
            <a href="/" class="bg-gray-800 hover:bg-black text-white p-4 rounded-lg text-center transition">
                <i class="fas fa-globe text-2xl mb-2"></i>
                <p class="font-bold">Home Page</p>
            </a>
        </div>
    </div>
</div>
</body>
</html>
