<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', function () {
    $urunler = Product::orderBy('created_at', 'desc')->take(8)->get();
    return view('home', ['urunler' => $urunler]);
});

Route::get('/urunler', function (Request $request) {
    $query = Product::query();
    
    if ($request->has('category') && $request->category) {
        $query->where('category_id', $request->category);
    }
    
    if ($request->has('search') && $request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('model', 'like', '%' . $request->search . '%')
              ->orWhere('brand', 'like', '%' . $request->search . '%');
    }
    
    $urunler = $query->get();
    $kategoriler = Category::all();
    
    return view('urunler', [
        'urunler' => $urunler,
        'kategoriler' => $kategoriler,
        'selectedCategory' => $request->category,
        'searchTerm' => $request->search
    ]);
});

Route::get('/urun/{id}', function ($id) {
    $urun = Product::find($id);
    if (!$urun) return redirect('/urunler');
    return view('urun-detay', ['urun' => $urun]);
});

Route::post('/sepet/ekle/{id}', function ($id) {
    $sepet = Session::get('sepet', []);
    if (isset($sepet[$id])) {
        $sepet[$id] += 1;
    } else {
        $sepet[$id] = 1;
    }
    Session::put('sepet', $sepet);
    return redirect('/sepet')->with('success', 'Product Orderse Saved!');
});

Route::get('/sepet', function () {
    $sepet = Session::get('sepet', []);
    $sepetUrunleri = [];
    $toplam = 0;
    foreach ($sepet as $id => $adet) {
        $urun = Product::find($id);
        if ($urun) {
            $sepetUrunleri[] = ['urun' => $urun, 'adet' => $adet];
            $toplam += $urun->price * $adet;
        }
    }
    return view('sepet', ['sepetUrunleri' => $sepetUrunleri, 'Total' => $toplam]);
});

Route::post('/sepet/sil/{id}', function ($id) {
    $sepet = Session::get('sepet', []);
    unset($sepet[$id]);
    Session::put('sepet', $sepet);
    return redirect('/sepet')->with('success', 'Products Deleted!');
});

Route::get('/kategoriler', function () {
    if (!Auth::check()) return redirect('/login');
    return view('kategoriler');
});

Route::get('/urun-ekle', function () {
    if (!Auth::check()) return redirect('/login');
    $kategoriler = Category::all();
    return view('urun-ekle', ['kategoriler' => $kategoriler]);
});

Route::post('/urun-ekle', function (Request $request) {
    if (!Auth::check()) return redirect('/login');
    
    $request->validate([
        'name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'required|url'
    ]);
    
    Product::create([
        'name' => $request->name,
        'model' => $request->model,
        'category_id' => $request->category_id,
        'brand' => $request->brand,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $request->image
    ]);
    
    return redirect('/urunler')->with('success', 'Products Saved!');
});

Route::get('/urun-duzenle/{id}', function ($id) {
    if (!Auth::check()) return redirect('/login');
    $urun = Product::findOrFail($id);
    $kategoriler = Category::all();
    return view('urun-duzenle', ['urun' => $urun, 'kategoriler' => $kategoriler]);
});
Route::post('/urun-duzenle/{id}', function ($id, Request $request) {
    if (!Auth::check()) return redirect('/login');
    
    $urun = Product::findOrFail($id);
    
    $request->validate([
        'name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'required|url'
    ]);
    
    $urun->update([
        'name' => $request->name,
        'model' => $request->model,
        'category_id' => $request->category_id,
        'brand' => $request->brand,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $request->image
    ]);
    
    return redirect('/urunler')->with('success', 'Products Updated!');
});

Route::post('/urun-sil/{id}', function ($id) {
    if (!Auth::check()) return redirect('/login');
    
    $urun = Product::findOrFail($id);
    $urun->delete();
    
    return redirect('/urunler')->with('success', 'Product Deleted!');
});

Route::get('/category/{slug}', function ($slug) {
    $kategori = Category::where('slug', $slug)->firstOrFail();
    $urunler = Product::where('category_id', $kategori->id)->get();
    $kategoriler = Category::all();
    
    return view('urunler', [
        'urunler' => $urunler,
        'kategoriler' => $kategoriler,
        'selectedCategory' => $kategori->id,
        'kategoriAdi' => $kategori->name
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::middleware('admin')->group(function () {
            Route::resource('users', UserController::class);
        });
    });
});
Route::get('/quick-login', function () {
    $user = User::firstOrCreate(
        ['email' => 'admin@mizone.com'],
        ['name' => 'Admin', 'password' => bcrypt('Admin123'), 'role' => 'admin']
    );
    Auth::login($user);
    return redirect('/admin');
});
Route::get('/logout', function () {
    Auth::logout();
    Session::forget('sepet');
    return redirect('/')->with('success', 'Exit!');
});