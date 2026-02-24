<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="text-2xl text-red-600 mr-3">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-800">Mi Zone Admin</h1>
            </div>
            
            <div class="flex items-center space-x-6">
                <!-- Kullanıcı Yönetimi Linki - Sadece Adminler Görür -->
                @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.users.index') }}" class="text-gray-700 hover:text-red-600 transition">
                    <i class="fas fa-users mr-1"></i> Kullanıcılar
                </a>
                @endif
                
                <span class="text-gray-700">
                    <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                    @if(Auth::user()->isAdmin())
                        <span class="bg-red-600 text-white text-xs px-2 py-1 rounded-full ml-2">Admin</span>
                    @else
                        <span class="bg-gray-600 text-white text-xs px-2 py-1 rounded-full ml-2">User</span>
                    @endif
                </span>
                
                <a href="{{ route('logout') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i>Çıkış
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>