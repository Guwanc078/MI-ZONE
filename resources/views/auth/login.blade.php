<!DOCTYPE html>
<html>
<head>
    <title>Giriş - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-xl w-96">
        <div class="text-center mb-8">
            <div class="text-4xl text-red-600 mb-2">
                <i class="fas fa-bolt"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Mi Zone Giriş</h2>
        </div>
        
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        
        <form method="POST" action="/login">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="admin@mizone.com" required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Şifre</label>
                <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" 
                       placeholder="123456" required>
            </div>
            
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i> Giriş Yap
            </button>
        </form>
        
        <div class="mt-6 text-center text-gray-600 text-sm">
            <p>Admin Paneli: <a href="/admin" class="text-red-600 font-bold hover:underline">/admin</a></p>
            <p class="mt-2">Ana Sayfa: <a href="/" class="text-red-600 hover:underline">Mi Zone</a></p>
        </div>
    </div>
</div>
</body>
</html>
