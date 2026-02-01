</div>
                        <p class="text-sm text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-red-600">{{ number_format($product->price, 2) }} TMT</span>
                            <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                {{ $product->stock }} adet
                            </span>
                        </div>
                        @if($product->old_price)
                        <span class="text-gray-500 line-through text-sm">{{ number_format($product->old_price, 2) }} TMT</span>
                        @endif
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="flex-1 bg-gray-100 text-gray-800 py-2 rounded text-center hover:bg-gray-200">
                            <i class="fas fa-eye mr-1"></i> İncele
                        </a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" 
                                    class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ $product->stock == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-cart-plus mr-1"></i> Sepete Ekle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection