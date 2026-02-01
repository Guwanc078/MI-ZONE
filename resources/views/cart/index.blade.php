
<!DOCTYPE html>
<html>
<head>
    <title>Sebet - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Sebetim</h1>
        
        @if(isset($cartItems) && count($cartItems) > 0)
        <div class="bg-white rounded-lg shadow p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-3">Products</th>
                        <th class="text-left p-3">Price</th>
                        <th class="text-left p-3">Stoc</th>
                        <th class="text-left p-3">Total Price</th>
                        <th class="text-left p-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr class="border-b">
                        <td class="p-3">
                            {{ $item->product->name ?? 'Ürün' }}
                        </td>
                        <td class="p-3">
                            {{ $item->product->price ?? 0 }} TMT
                        </td>
                        <td class="p-3">
                            <form action="/sepet/guncelle/{{ $item->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center">
                                    <button type="button" onclick="decreaseQty({{ $item->id }})" class="bg-gray-200 px-3 py-1 rounded-l">-</button>
                                    <input type="number" id="qty-{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" class="w-12 text-center border py-1">
                                    <button type="button" onclick="increaseQty({{ $item->id }})" class="bg-gray-200 px-3 py-1 rounded-r">+</button>
                                    <button type="submit" class="ml-2 text-blue-600">Update</button>
                                </div>
                            </form>
                        </td>
                        <td class="p-3">
                            {{ ($item->product->price ?? 0) * $item->quantity }} TMT
                        </td>
                        <td class="p-3">
                            <form action="/sepet/sil/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-6 pt-6 border-t">
                <div class="flex justify-between">
                    <div>
                        <a href="/urunler" class="text-blue-600">Dowam Et</a>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold">
                            Total: {{ $total ?? 0 }} TMT
                        </div>
                        <button class="mt-4 bg-red-600 text-white px-6 py-2 rounded">Pay</button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow p-12 text-center">
            <div class="text-5xl text-gray-300 mb-4">
                🛒
            </div>
            <h2 class="text-2xl font-bold mb-4">Sebetiniz Boş</h2>
            <p class="text-gray-600 mb-6">Sepebinizde Product Tapylmady.</p>
            <a href="/urunler" class="bg-red-600 text-white px-6 py-3 rounded">Dowam et</a>
        </div>
        @endif
    </div>

    <script>
    function increaseQty(itemId) {
        const input = document.getElementById('qty-' + itemId);
        input.value = parseInt(input.value) + 1;
    }
    
    function decreaseQty(itemId) {
        const input = document.getElementById('qty-' + itemId);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
    </script>
</body>
</html>
