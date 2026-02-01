</div>
                    </div>
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2">Adet:</label>
                            <div class="flex items-center">
                                <button type="button" class="bg-gray-200 px-3 py-1 rounded-l" onclick="decreaseQuantity()">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                       class="border-t border-b text-center w-16 py-1" readonly>
                                <button type="button" class="bg-gray-200 px-3 py-1 rounded-r" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors font-bold mb-3 {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $product->stock == 0 ? 'disabled' : '' }}>
                            <i class="fas fa-cart-plus mr-2"></i> Sepete Ekle
                        </button>
                        
                        <a href="{{ route('cart.index') }}" 
                           class="block w-full bg-gray-100 text-gray-800 py-3 rounded-lg text-center hover:bg-gray-200 transition-colors">
                            <i class="fas fa-shopping-cart mr-2"></i> Sepete Git
                        </a>
                    </form>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-bold mb-3">Hızlı Teslimat</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <i class="fas fa-shipping-fast text-green-600 mr-2"></i>
                            <span>Aynı Gün Kargo (İstanbul)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                            <span>2 Yıl Garanti</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-undo text-purple-600 mr-2"></i>
                            <span>14 Gün İade Garantisi</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-credit-card text-orange-600 mr-2"></i>
                            <span>12 Ay Taksit İmkanı</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@if($relatedProducts->count() > 0)
<div class="mt-8">
    <h3 class="text-2xl font-bold mb-4">Benzer Ürünler</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach($relatedProducts as $related)
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="text-center mb-2">
                <div class="text-3xl">
                    <i class="fas fa-mobile-alt text-gray-400"></i>
                </div>
                <h4 class="font-bold">{{ $related->name }}</h4>
                <p class="text-sm text-gray-600">{{ $related->brand->name }}</p>
            </div>
            <div class="text-center">
                <span class="text-red-600 font-bold">{{ number_format($related->price, 2) }} TMT</span>
                <a href="{{ route('products.show', $related->slug) }}" 
                   class="block mt-2 text-blue-600 hover:text-blue-800 text-sm">
                    <i class="fas fa-external-link-alt mr-1"></i> İncele
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif