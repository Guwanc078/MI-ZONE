<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

Route::get('/', function () {
    $urunler = Product::take(8)->get();
    return view('home', ['urunler' => $urunler]);
});

Route::get('/urunler', function () {
    $urunler = Product::all();
    return view('urunler', ['urunler' => $urunler]);
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
    return redirect('/sepet')->with('success', 'Ürün sepete eklendi!');
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
    return view('sepet', ['sepetUrunleri' => $sepetUrunleri, 'toplam' => $toplam]);
});

Route::post('/sepet/sil/{id}', function ($id) {
    $sepet = Session::get('sepet', []);
    unset($sepet[$id]);
    Session::put('sepet', $sepet);
    return redirect('/sepet')->with('success', 'Ürün silindi!');
});

Route::get('/kategoriler', function () {
    if (!Auth::check()) return redirect('/login');
    return view('kategoriler');
});

Route::get('/urun-ekle', function () {
    if (!Auth::check()) return redirect('/login');
    return view('urun-ekle');
});

Route::post('/urun-ekle', function (Request $request) {
    if (!Auth::check()) return redirect('/login');
    Product::create([
        'name' => $request->name,
        'model' => $request->model,
        'category' => $request->category,
        'brand' => $request->brand,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $request->image
    ]);
    return redirect('/urunler')->with('success', 'Ürün eklendi!');
});

Route::get('/telefonlar', function () {
    $urunler = Product::where('category', 'telefonlar')->get();
    return view('urunler', ['urunler' => $urunler]);
});

Route::get('/akilli-saatler', function () {
    $urunler = Product::where('category', 'akilli-saatler')->get();
    return view('urunler', ['urunler' => $urunler]);
});

Route::get('/kulakliklar', function () {
    $urunler = Product::where('category', 'kulakliklar')->get();
    return view('urunler', ['urunler' => $urunler]);
});

Route::get('/tabletler', function () {
    $urunler = Product::where('category', 'tabletler')->get();
    return view('urunler', ['urunler' => $urunler]);
});

Route::get('/aksesuarlar', function () {
    $urunler = Product::where('category', 'aksesuarlar')->get();
    return view('urunler', ['urunler' => $urunler]);
});

Route::get('/login', function () {
    $user = User::firstOrCreate(
        ['email' => 'admin@mizone.com'],
        ['name' => 'Admin', 'password' => 'Admin123']
    );
    Auth::login($user);
    return redirect('/admin');
});

Route::get('/admin', function () {
    if (!Auth::check()) return redirect('/login');
    return view('admin.dashboard');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});